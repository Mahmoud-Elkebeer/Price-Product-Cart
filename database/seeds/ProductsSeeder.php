<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name' => 'T-shirt',
            'price' => 10.99,
            ],
            [
                'name' => 'Pants',
                'price' => 14.99,
            ],
                [
                'name' => 'Jacket',
                'price' => 19.99,
            ],
            [
                'name' => 'Shoes',
                'price' => 24.99,
            ]]
        );
    }
}
