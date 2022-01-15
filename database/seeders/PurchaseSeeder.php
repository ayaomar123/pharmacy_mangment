<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchase::query()->create([
            'name' => 'diazepam',
            'category_id' => 1,
            'price' => 10,
            'quantity'=>25,
            'image' =>"a.jpg",
            'expiry_date' => '2022-02-09',
            'supplier_id' =>1,
        ]);

        Purchase::query()->create([
            'name' => 'ketamine',
            'category_id' => 2,
            'price' => 10,
            'quantity'=>25,
            'image' =>"a.jpg",
            'expiry_date' => '2022-02-09',
            'supplier_id' =>1,
        ]);

        Purchase::query()->create([
            'name' => 'halothane',
            'category_id' => 3,
            'price' => 15,
            'quantity'=>50,
            'image' =>"a.jpg",
            'expiry_date' => '2022-02-09',
            'supplier_id' =>1,
        ]);

        Purchase::query()->create([
            'name' => 'oxygen',
            'category_id' => 4,
            'price' => 10,
            'quantity'=>25,
            'image' =>"a.jpg",
            'expiry_date' => '2022-02-09',
            'supplier_id' =>2,
        ]);

        Purchase::query()->create([
            'name' => 'thiopental',
            'category_id' => 5,
            'price' => 10,
            'quantity'=>25,
            'image' =>"a.jpg",
            'expiry_date' => '2022-02-09',
            'supplier_id' =>3,
        ]);

        Purchase::query()->create([
            'name' => 'nitrous oxide',
            'category_id' => 6,
            'price' => 10,
            'quantity'=>25,
            'image' =>"a.jpg",
            'expiry_date' => '2022-12-09',
            'supplier_id' =>2,
        ]);

        Purchase::query()->create([
            'name' => 'lidocaine',
            'category_id' => 1,
            'price' => 4,
            'quantity'=>5,
            'image' =>"a.jpg",
            'expiry_date' => '2022-12-09',
            'supplier_id' =>3,
        ]);

        Purchase::query()->create([
            'name' => 'bupivacaine',
            'category_id' => 2,
            'price' => 10,
            'quantity'=>10,
            'image' =>"a.jpg",
            'expiry_date' => '2022-10-09',
            'supplier_id' =>2,
        ]);
    }
}
