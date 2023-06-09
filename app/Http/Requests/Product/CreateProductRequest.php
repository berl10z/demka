<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required', 'string','max:255',
            'image' => 'required', 'string',
            'price' => 'required', 'numeric',
            'count' => 'required', 'numeric',
            'category_id' => 'required'
        ];
    }
}
