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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags),
            'ingredients' => IngredientResource::collection($this->ingredients),
            'status' => $this->getStatus($request->input('diff_time')),
        ];
    }
}
