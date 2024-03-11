<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory, Translatable, SoftDeletes;

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

    public function getStatus($diffTime): string
    {
        if ($diffTime > 0) {
            if ($this->created_at >= date('Y-m-d H:i:s', $diffTime)) {
                return 'created';
            }
            if ($this->updated_at >= date('Y-m-d H:i:s', $diffTime)) {
                return 'modified';
            }
            if ($this->deleted_at !== null) {
                return 'deleted';
            }
        }
        return 'created';
    }
    
}
