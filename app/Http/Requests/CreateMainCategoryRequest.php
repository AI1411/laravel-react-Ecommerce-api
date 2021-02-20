<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMainCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:15'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
