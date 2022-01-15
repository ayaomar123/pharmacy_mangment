<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SupplierSeeder::class,
            PurchaseSeeder::class,
            ProductSeeder::class,
           // UserSeeder::class
        ]);
    }
}
