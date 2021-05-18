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
        $categories = [
            [
                'id'             => 1,
                'name'           => 'Fashion',
            ],

            [
                'id'             => 2,
                'name'           => 'Toys & Hobby',
            ],

            [
                'id'             => 3,
                'name'           => 'Electronics & Media',
            ],

            [
                'id'             => 4,
                'name'           => 'Food and Personal Care',
            ],

            [
                'id'             => 5,
                'name'           => 'Furniture & Appliance',
            ],
        ];
        Category::insert($categories);
    }
}
