<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'tel' => 'nullable',
            'birthday' => 'nullable',
            'status' => 'required',
            'money' => 'nullable',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function failedValidation($validator)
    {
        $res = response()->json([
            'status' => 422,
            'errors' => $validator->errors(),
        ],422);
        throw new HttpResponseException($res);
    }
}
