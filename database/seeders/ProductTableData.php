<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableData extends Seeder
{
    /**
     * Run the database seeds.
     */

    //  to run this seeder -> php artisan db:seed --class=ProductTableData
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => "hello",
            'qty' => 15,
            'price' => 15.2,
            'description' => "meka thamai visthare",
        ]);
    }
}
