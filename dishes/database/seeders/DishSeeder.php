<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\DishTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dishes = [
            [
                'category_id' => 1,
                'tags' => [1],
                'ingredients' => [1],
            ],
            [
                'tags' => [2, 3],
                'ingredients' => [2],
            ],
            [
                'category_id' => 2,
                'tags' => [4],
                'ingredients' => [3, 4, 5],
            ],
        ];

        foreach ($dishes as $dishData) {
            $dish = Dish::create([
                'category_id' => $dishData['category_id'] ?? null,
            ]);

            if (isset($dishData['tags'])) {
                $dish->tags()->attach($dishData['tags']);
            }

            if (isset($dishData['ingredients'])) {
                $dish->ingredients()->attach($dishData['ingredients']);
            }
        }

        $dishTranslations = [
            [
                'dish_id' => 1,
                'locale' => 'en',
                'title' => 'Pasta Salad',
                'description' => 'Pasta salad with cherry tomatoes, mozzarella, and basil'
            ],
            [
                'dish_id' => 2,
                'locale' => 'en',
                'title' => 'Vegan Chocolate Cake',
                'description' => 'Vegan chocolate cake with a chocolate glaze'
            ],
            [
                'dish_id' => 3,
                'locale' => 'en',
                'title' => 'Chicken Salad',
                'description' => 'Chicken salad with lettuce, tomatoes, and croutons'
            ],
            [
                'dish_id' => 1,
                'locale' => 'hr',
                'title' => 'Salata od tjestenine',
                'description' => 'Salata od tjestenine s cherry rajčicama, mozzarellom i bosiljkom'
            ],
            [
                'dish_id' => 2,
                'locale' => 'hr',
                'title' => 'Veganska čokoladna torta',
                'description' => 'Veganska čokoladna torta s čokoladnim preljevom'
            ],
            [
                'dish_id' => 3,
                'locale' => 'hr',
                'title' => 'Pileća salata',
                'description' => 'Pileća salata s zeljem, rajčicama i krutonima'
            ],
        ];

        foreach ($dishTranslations as $dishTranslation) {
            DishTranslation::create($dishTranslation);
        }

    }
}
