<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'errors' => true,
            'message' => $errors->messages()
        ], 422);

        throw new HttpResponseException($response);
    }
}
