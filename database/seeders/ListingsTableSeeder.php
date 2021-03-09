<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l1 = new Listing([
            "title" => "Couch",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam soluta libero vitae magni, saepe deleniti non voluptate quaerat veniam? Fuga ipsam incidunt deleniti doloremque quis hic est in doloribus officia?",
            "price" => 100,
            "category_id" => 1,
        ]);
        $l1->save();

        $l2 = new Listing([
            "title" => "Limited edition red jacket",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam soluta libero vitae magni, saepe deleniti non voluptate quaerat veniam? Fuga ipsam incidunt deleniti doloremque quis hic est in doloribus officia?",
            "price" => 100,
            "category_id" => 2,
        ]);
        $l2->save();

        $l3 = new Listing([
            "title" => "Couch",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam soluta libero vitae magni, saepe deleniti non voluptate quaerat veniam? Fuga ipsam incidunt deleniti doloremque quis hic est in doloribus officia?",
            "price" => 100,
            "category_id" => 1,
        ]);
        $l3->save();

        $l4 = new Listing([
            "title" => "Limited edition red jacket",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam soluta libero vitae magni, saepe deleniti non voluptate quaerat veniam? Fuga ipsam incidunt deleniti doloremque quis hic est in doloribus officia?",
            "price" => 100,
            "category_id" => 2,
        ]);
        $l4->save();
    }
}
