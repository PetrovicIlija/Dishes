<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishesGetRequest;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function index(DishesGetRequest $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $category = $request->input('category', null);
        $tags = $request->input('tags', []);
        $with = $request->input('with', []);
        if ($request->input('lang')) {
            app()->setLocale($request->input('lang'));
        }
        else {
            app()->setLocale('en');
        }
        $diffTime = $request->input('diff_time');
        $dishes = Dish::query();
        if ($category !== null) {
            if ($category === 'NULL') {
                $dishes->whereNull('category_id');
            } elseif ($category === '!NULL') {
                $dishes->whereNotNull('category_id');
            } else {
                $dishes->where('category_id', $category);
            }
        }
        $tags = is_array($tags) ? $tags : explode(',', $tags);
        foreach ($tags as $tag) {
            $dishes->whereHas('tags', function ($query) use ($tag) {
                $query->where('tag_id', $tag);
            });
        }
        $with = is_array($with) ? $with : explode(',', $with);
        if (in_array('ingredients', $with)) {
            $dishes->with('ingredients');
        }
        if (in_array('category', $with)) {
            $dishes->with('category');
        }
        if (in_array('tags', $with)) {
            $dishes->with('tags');
        }
        if ($diffTime > 0) {
            $dishes->withTrashed()->where(function ($query) use ($diffTime) {
                $query->where('created_at', '>=', date('Y-m-d H:i:s', $diffTime))
                    ->orWhere('updated_at', '>=', date('Y-m-d H:i:s', $diffTime))
                    ->orWhere('deleted_at', '>=', date('Y-m-d H:i:s', $diffTime));
            });
        }
        $dishes = $dishes->paginate($perPage, ['*'], 'page', $page);
        return DishResource::collection($dishes);
    }
}
