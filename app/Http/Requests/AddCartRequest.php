<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCartRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required',
            'user_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
