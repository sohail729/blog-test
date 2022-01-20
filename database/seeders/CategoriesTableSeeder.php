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
                'title' => 'Travel',
                'slug' => 'travel',
                'description' => 'Travel',
                'in_header' => 1,
                'in_footer' => 1
            ],
            [
                'title' => 'Lifestyle',
                'slug' => 'lifestyle',
                'description' => 'Lifestyle',
                'in_header' => 1,
                'in_footer' => 1
            ],
            [
                'title' => 'Sports',
                'slug' => 'sports',
                'description' => 'Sports',
                'in_header' => 0,
                'in_footer' => 1
            ],
            [
                'title' => 'Technology',
                'slug' => 'technology',
                'description' => 'Technology',
                'in_header' => 0,
                'in_footer' => 1
            ],
            [
                'title' => 'Food',
                'slug' => 'food',
                'description' => 'Food',
                'in_header' => 1,
                'in_footer' => 1
            ]
        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}
