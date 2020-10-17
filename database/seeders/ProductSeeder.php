<?php

namespace Database\Seeders;

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
        DB::table('products')->insert([
        	'name' => 'CHELSEA 3RD 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 2,
            'image' => 'assets/products/chelsea.png'
        ]);

        DB::table('products')->insert([
            'name' => 'LEICESTER CITY HOME 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 2,
            'image' => 'assets/products/leicester.png'
        ]);

        DB::table('products')->insert([
            'name' => 'MAN. UNITED AWAY 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 2,
            'image' => 'assets/products/mu.png'
        ]);

        DB::table('products')->insert([
            'name' => 'LIVERPOOL AWAY 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 2,
            'image' => 'assets/products/liverpool.png'
        ]);

        DB::table('products')->insert([
            'name' => 'TOTTENHAM 3RD 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 2,
            'image' => 'assets/products/tottenham.png'
        ]);

        DB::table('products')->insert([
            'name' => 'DORTMUND AWAY 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 1,
            'image' => 'assets/products/dortmund.png'
        ]);

        DB::table('products')->insert([
            'name' => 'BAYERN MUNCHEN 3RD 2018 2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 1,
            'image' => 'assets/products/munchen.png'
        ]);

        DB::table('products')->insert([
            'name' => 'JUVENTUS AWAY 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 4,
            'image' => 'assets/products/juve.png'
        ]);

        DB::table('products')->insert([
            'name' => 'AS ROMA HOME 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 4,
            'image' => 'assets/products/asroma.png'
        ]);

        DB::table('products')->insert([
            'name' => 'AC MILAN HOME 2018 2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 4,
            'image' => 'assets/products/acmilan.png'
        ]);

        DB::table('products')->insert([
            'name' => 'LAZIO HOME 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 4,
            'image' => 'assets/products/lazio.png'
        ]);

        DB::table('products')->insert([
            'name' => 'REAL MADRID 3RD 2018-2019',
            'price' => 200000,
            'price_buy' => 180000,
            'qty' => 100,
            'description' => '-',
            'category_id' => 3,
            'image' => 'assets/products/madrid.png'
        ]);
    }
}
