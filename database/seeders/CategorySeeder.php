<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'General anaesthetics and oxygen',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Local anaesthetics',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Opioid analgesics',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Disease modifying agents used in rheumatoid disorders',
            'created_at' => now(),
        ]);


        DB::table('categories')->insert([
            'name' => 'ANTIALLERGICS AND MEDICINES USED IN ANAPHYLAXIS',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'ANTIDOTES AND OTHER SUBSTANCES USED IN POISONINGS
',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Specific',
            'created_at' => now(),
        ]);
    }
}
