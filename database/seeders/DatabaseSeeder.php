<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $furniture = new Category();
        $furniture->title = "Furniture";
        $furniture->save();

        $clothing = new Category();
        $clothing->title = "Clothing";
        $clothing->save();

        $technology = new Category();
        $technology->title = "Technology";
        $technology->save();

    }
}
