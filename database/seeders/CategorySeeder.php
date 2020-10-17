<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        	'name' => 'Bundes Liga',
        	'slug' => Str::slug('Bundes Liga'),
        	'image' => 'assets/category/bundesliga.png',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Premier League',
        	'slug' => Str::slug('Premier League'),
        	'image' => 'assets/category/premierleague.png',
        ]);

        DB::table('categories')->insert([
        	'name' => 'La Liga',
        	'slug' => Str::slug('La Liga'),
        	'image' => 'assets/category/laliga.png',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Serie A',
        	'slug' => Str::slug('Serie A'),
        	'image' => 'assets/category/seriea.png',
        ]);
    }
}
