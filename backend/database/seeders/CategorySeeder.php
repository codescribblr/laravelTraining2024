<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'description' => 'Electronic items and gadgets.', 'weight' => 3],
            ['name' => 'Books', 'description' => 'Various kinds of books.', 'weight' => 2],
            ['name' => 'Clothing', 'description' => 'Men and Women clothing.', 'weight' => 4],
        ]);
    }
}
