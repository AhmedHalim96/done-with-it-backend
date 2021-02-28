<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
