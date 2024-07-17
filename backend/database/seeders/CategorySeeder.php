<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->updateOrInsert(
            ['name' => 'Electronics'],
            ['description' => 'Electronic items and gadgets.', 'weight' => 3]
        );

        DB::table('categories')->updateOrInsert(
            ['name' => 'Books'],
            ['description' => 'Various kinds of books.', 'weight' => 2]
        );

        DB::table('categories')->updateOrInsert(
            ['name' => 'Clothing'],
            ['description' => 'Men and Women clothing.', 'weight' => 4]
        );
    }
}
