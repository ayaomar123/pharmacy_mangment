<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::query()->create([
            'name' => "Aya pharmacy Supplier",
            'email' => "Aya_supplier@ayapharmacy.com",
            'phone' => '05987456',
            'company' => 'Pharmacy Co.',
            'address' => 'UAE',
            'product' => 'medicine',
            'description' => 'lorem50'
        ]);

        Supplier::query()->create([
            'name' => "Maram pharmacy Supplier",
            'email' => "Maram_supplier@ayapharmacy.com",
            'phone' => '0598745610',
            'company' => 'Pharmacy Co.',
            'address' => 'UAE',
            'product' => 'medicine',
            'description' => 'lorem50'
        ]);

        Supplier::query()->create([
            'name' => "Lama pharmacy Supplier",
            'email' => "Lama_supplier@ayapharmacy.com",
            'phone' => '0598745611',
            'company' => 'Pharmacy Co.',
            'address' => 'UAE',
            'product' => 'medicine',
            'description' => 'lorem50'
        ]);
    }
}
