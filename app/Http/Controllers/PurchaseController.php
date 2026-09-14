<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function index()
    {
        $title = "purchases";
        $purchases = Purchase::with('category')->get();
        return view('purchases.purchases', compact(
            'title',
            'purchases'
        ));
    }

    public function create()
    {
        $title = "add Purchase";
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('purchases.add-purchase', compact(
            'title',
            'categories',
            'suppliers'
        ));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'category' => 'required',
            'price' => 'required|min:1',
            'quantity' => 'required|min:1',
            'expiry_date' => 'required',
            'supplier' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png,gif',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/purchases'), $imageName);
        }
        try {
            $purchase = Purchase::create([
                'name' => $request->name,
                'category_id' => $request->category,
                'supplier_id' => $request->supplier,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'expiry_date' => $request->expiry_date,
                'image' => $imageName,
            ]);
            $notifications = array(
                'success' => __('app.messages.stock_added', ['name' => $purchase->name]),
                // 'alert-type' => 'success',
            );
        } catch (\Throwable $th) {
            $notifications = array(
                'error' => __('app.messages.generic_error'),
                // 'alert-type' => 'error',
            );
        }
        return redirect()->route('purchases')->with($notifications);
    }


    public function show(Request $request, $id)
    {
        $title = "Edit Purchase";
        $purchase = Purchase::find($id);
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('purchases.edit-purchase', compact(
            'title',
            'purchase',
            'categories',
            'suppliers'
        ));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'expiry_date' => 'required',
            'supplier' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png,gif',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/purchases'), $imageName);
        }

        try {
            $purchase->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'supplier_id' => $request->supplier,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'expiry_date' => $request->expiry_date,
                'image' => $imageName??$request->update_image,
            ]);
            $notifications = array(
                'success' => __('app.messages.stock_updated', ['name' => $purchase->name]),
            );
        } catch (\Throwable $th) {
            $notifications = array(
                'error' => __('app.messages.generic_error'),
            );
        }
        return redirect()->route('purchases')->with($notifications);
    }


    public function destroy(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $purchase->delete();
        $notification = array(
            'message' => __('app.messages.purchase_deleted'),
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
