<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        $title = "products";
        $products = Product::with('purchase')->get();

        return view('products.products',compact(
            'title','products',
        ));
    }

    public function create(){
        $title= "Add Product";
        $products = Purchase::get();
        return view('products.add-product',compact(
            'title','products',
        ));
    }

    public function expired(){
        $title = "expired Products";
        $products = Purchase::whereDate('expiry_date', '<=', Carbon::today())->get();

        return view('products.expired',compact(
            'title','products'
        ));
    }


    public function outstock(){
        $title = "outstocked Products";
        $products = Purchase::where('quantity', '<=', 0)->get();

        return view('products.outstock',compact(
            'title','products',
        ));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'product'=>'required|exists:purchases,id',
            'price'=>'required|numeric|min:0',
            'discount'=>'nullable|numeric|min:0|max:100',
            'description'=>'nullable|max:200',
        ]);
        $price = $this->priceAfterDiscount($request->price, $request->discount);
       try {
            Product::create([
            'purchase_id'=>$request->product,
            'price'=>$price,
            'discount'=>$request->discount,
            'description'=>$request->description,
        ]);
        $notification=array(
            'success' => __('app.messages.medicine_added'),
        );
       } catch (\Throwable $th) {
        $notifications = array(
            'error' => __('app.messages.generic_error'),
        );
       }
        return redirect()->route('products')->with($notification);
    }

    public function show(Request $request, $id)
    {
        $title = "Edit Product";
        $product = Product::find($id);
        $purchased_products = Purchase::get();
        return view('products.edit-product',compact(
            'title','product','purchased_products'
        ));
    }

    public function update(Request $request,Product $product)
    {
        $this->validate($request,[
            'product'=>'required|exists:purchases,id',
            'price'=>'required|numeric|min:0',
            'discount'=>'nullable|numeric|min:0|max:100',
            'description'=>'nullable|max:200',
        ]);

        $price = $this->priceAfterDiscount($request->price, $request->discount);
       try {
        $product->update([
            'purchase_id'=>$request->product,
            'price'=>$price,
            'discount'=>$request->discount,
            'description'=>$request->description,
        ]);
        $notification=array(
            'success' => __('app.messages.medicine_updated'),
        );
       } catch (\Throwable $th) {
        $notifications = array(
            'error' => __('app.messages.generic_error'),
        );
       }
        return redirect()->route('products')->with($notification);
    }

    /**
     * Apply the discount, given as a percentage, to the unit price.
     *
     * @param  float|int|string       $price
     * @param  float|int|string|null  $discount  percentage between 0 and 100
     * @return float
     */
    private function priceAfterDiscount($price, $discount)
    {
        $price = (float) $price;
        $discount = (float) $discount;

        if ($discount <= 0) {
            return $price;
        }

        return round($price * (1 - ($discount / 100)), 2);
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        $notification = array(
            'success' => __('app.messages.product_deleted'),
        );
        return back()->with($notification);
    }
}
