<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            'Pasta',
            'Chicken',
            'Chocolate',
            'Lettuce',
            'Dough'
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create([
                'slug' => $ingredient
            ]);
        }

        $ingredientTranslations = [
            [
                'title' => 'Pasta',
                'ingredient_id' => 1,
                'locale' => 'en'
            ],
            [
                'title' => 'Chicken',
                'ingredient_id' => 2,
                'locale' => 'en'
            ],
            [
                'title' => 'Chocolate',
                'ingredient_id' => 3,
                'locale' => 'en'
            ],
            [
                'title' => 'Lettuce',
                'ingredient_id' => 4,
                'locale' => 'en'
            ],
            [
                'title' => 'Dough',
                'ingredient_id' => 5,
                'locale' => 'en'
            ],
            [
                'title' => 'Tjestenina',
                'ingredient_id' => 1,
                'locale' => 'hr'
            ],
            [
                'title' => 'Piletina',
                'ingredient_id' => 2,
                'locale' => 'hr'
            ],
            [
                'title' => 'Čokolada',
                'ingredient_id' => 3,
                'locale' => 'hr'
            ],
            [
                'title' => 'Salata',
                'ingredient_id' => 4,
                'locale' => 'hr'
            ],
            [
                'title' => 'Tijesto',
                'ingredient_id' => 5,
                'locale' => 'hr'
            ],
        ];

        foreach ($ingredientTranslations as $ingredientTranslation) {
            IngredientTranslation::create([
                'title' => $ingredientTranslation['title'],
                'ingredient_id' => $ingredientTranslation['ingredient_id'],
                'locale' => $ingredientTranslation['locale']
            ]);
        }
    }
}
