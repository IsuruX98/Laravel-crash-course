<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductTableData extends Seeder
{
    /**
     * Run the database seeds.
     */

    //  to run this seeder -> php artisan db:seed --class=ProductTableData
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'name' => $faker->name,
                'qty' => rand(1, 100),
                'price' => number_format(rand(100, 9999) / 100, 2),
                'description' => $faker->sentence,
            ]);
        }
    }
}
