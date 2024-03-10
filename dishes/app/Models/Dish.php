<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function translations()
    {
        return $this->hasMany(DishTranslation::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
