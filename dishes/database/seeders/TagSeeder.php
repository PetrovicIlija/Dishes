<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Vegetarian',
            'Vegan',
            'Gluten-free',
            'Lactose-free',
            'Spicy'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'slug' => strtolower($tag)
            ]);
        }

        $tagTranslations = [
            [
                'title' => 'Vegetarian',
                'tag_id' => 1,
                'locale' => 'en'
            ],
            [
                'title' => 'Vegan',
                'tag_id' => 2,
                'locale' => 'en'
            ],
            [
                'title' => 'Gluten-free',
                'tag_id' => 3,
                'locale' => 'en'
            ],
            [
                'title' => 'Lactose-free',
                'tag_id' => 4,  
                'locale' => 'en'
            ],
            [
                'title' => 'Spicy',
                'tag_id' => 5,
                'locale' => 'en'
            ],
            [
                'title' => 'Vegetarijansko',
                'tag_id' => 1,
                'locale' => 'hr'
            ],
            [
                'title' => 'Vegansko',
                'tag_id' => 2,
                'locale' => 'hr'
            ],
            [
                'title' => 'Bez glutena',
                'tag_id' => 3,
                'locale' => 'hr'
            ],
            [
                'title' => 'Bez laktoze',
                'tag_id' => 4,
                'locale' => 'hr'
            ],
            [
                'title' => 'Ljuto',
                'tag_id' => 5,
                'locale' => 'hr'
            ],
        ];

        foreach ($tagTranslations as $tagTranslation) {
            TagTranslation::create([
                'title' => $tagTranslation['title'],
                'tag_id' => $tagTranslation['tag_id'],
                'locale' => $tagTranslation['locale']
            ]);
        }
    }
}
