<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'max:100'],
            'model' => ['required', 'max:100'],
            'brand_id' => ['required', 'exists:brands,id'],
            'description' => ['required'],
            'img' => ['nullable', 'max:5000'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_public' => ['nullable'],
        ];
    }
}
