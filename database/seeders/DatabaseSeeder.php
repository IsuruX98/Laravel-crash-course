<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    //  to run main seeder -> php artisan db:seed
    public function run(): void
    {
        $this->call([
            ProductTableData::class
        ]);
    }
}
