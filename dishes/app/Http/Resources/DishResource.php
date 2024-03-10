<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ];

        if ($request->has('with')) {
            $with = explode(',', $request->input('with'));

            if (in_array('category', $with)) {
                $data['category'] = new CategoryResource($this->category);
            }

            if (in_array('tags', $with)) {
                $data['tags'] = TagResource::collection($this->tags);
            }

            if (in_array('ingredients', $with)) {
                $data['ingredients'] = IngredientResource::collection($this->ingredients);
            }
        }

        $data['status'] = $this->getStatus($request->input('diff_time'));

        return $data;
    }
}
