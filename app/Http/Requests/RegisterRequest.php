<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Session;

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
            'email' => emailRules(),
            'password' => passwordRules(),
            'confirm_password' => array_merge(passwordRules(regex: false), ['same:password']),
            'captcha' => captchaRules(),
        ];
    }
}
