<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->toArray(), 422));
    }

    public function rules()
    {
        return [
            'name' => stringRules(),
            'surname' => stringRules(),
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'confirm_password' => array_merge(stringRules(false), ['same:password', 'min:8']),
        ];
    }
}
