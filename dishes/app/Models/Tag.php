<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title'];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }

    public function translations()
    {
        return $this->hasMany(TagTranslation::class);
    }
}
