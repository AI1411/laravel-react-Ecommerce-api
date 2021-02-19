<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:24',
            'main_category_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
