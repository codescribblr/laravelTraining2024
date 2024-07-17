<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'Political'],
            ['name' => 'Economic'],
            ['name' => 'Social'],
            ['name' => 'Cultural'],
            ['name' => 'Technological'],
            ['name' => 'Legal'],
            ['name' => 'Environmental'],
            ['name' => 'Ethical'],
        ]);
    }
}
