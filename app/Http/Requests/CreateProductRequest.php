<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
