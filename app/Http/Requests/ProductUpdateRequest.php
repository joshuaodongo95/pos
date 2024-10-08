<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'default_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'weight' => 'required|integer',
        ];
    }
}
