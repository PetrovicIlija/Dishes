<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:1',
            'page' => 'nullable|integer|min:1',
            'category' => 'nullable|integer',
            'tags.*' => 'nullable|integer',
            'with.*' => 'nullable|in:ingredients,category,tags',
            'lang' => 'required|string',
            'diff_time' => 'nullable|integer|min:0',
        ];
    }
}
