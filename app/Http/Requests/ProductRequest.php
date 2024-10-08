<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category' => 'required',
            'brand' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'default_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
    }
}
