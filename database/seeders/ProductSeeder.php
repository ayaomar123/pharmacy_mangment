<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->create([
            'purchase_id' => 1 ,
            'price' => 10,
            'discount' => 0,
            'description' =>'lorem',
        ]);

        Product::query()->create([
            'purchase_id' => 2 ,
            'price' => 10,
            'discount' => 0,
            'description' =>'lorem',
        ]);

        Product::query()->create([
            'purchase_id' => 3 ,
            'price' => 25,
            'discount' => 0,
            'description' =>'lorem',
        ]);

        Product::query()->create([
            'purchase_id' => 4 ,
            'price' => 4,
            'discount' => 2,
            'description' =>'lorem',
        ]);

        Product::query()->create([
            'purchase_id' => 5 ,
            'price' => 15,
            'discount' => 10,
            'description' =>'lorem',
        ]);

        Product::query()->create([
            'purchase_id' => 6 ,
            'price' => 6,
            'discount' => 0,
            'description' =>'lorem',
        ]);
    }
}
