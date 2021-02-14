<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateFavoriteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => 'required',
            'product_id' => 'required',
        ];
    }

    /**
     * [override] バリデーション失敗時ハンドリング
     * @throw HttpResponseException
     * @see FormRequest::failedValidation()
     */
    protected function failedValidation($validator)
    {
        $response['status']  = '422';
        $response['errors']  = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json( $response, 422 )
        );
    }

    public function authorize()
    {
        return true;
    }
}
