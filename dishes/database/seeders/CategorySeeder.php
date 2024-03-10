<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Salads',
            'Main dishes',
            'Desserts'
        ];

        foreach ($categories as $category) {
            Category::create([
                'slug' => strtolower($category)
            ]);
        }

        $categoryTranslations = [
            [
                'title' => 'Salads',
                'category_id' => 1,
                'locale' => 'en'
            ],
            [
                'title' => 'Main dishes',
                'category_id' => 2,
                'locale' => 'en'
            ],
            [
                'title' => 'Desserts',
                'category_id' => 3,
                'locale' => 'en'
            ],
            [
                'title' => 'Salata',
                'category_id' => 1,
                'locale' => 'hr'
            ],
            [
                'title' => 'Glavna jela',
                'category_id' => 2,
                'locale' => 'hr'
            ],
            [
                'title' => 'Deserti',
                'category_id' => 3,
                'locale' => 'hr'
            ],
        ];

        foreach ($categoryTranslations as $categoryTranslation) {
            CategoryTranslation::create([
                'title' => $categoryTranslation['title'],
                'category_id' => $categoryTranslation['category_id'],
                'locale' => $categoryTranslation['locale']
            ]);
        }
    }
}
