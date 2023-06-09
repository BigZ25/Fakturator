<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingsRequest extends FormRequest
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
        return array_merge([
            'name' => stringRules(),
            'surname' => stringRules(),
            'email' => array_merge(stringRules(), ['unique:users,email,' . auth()->id()]),
            'new_password' => passwordRules(false),
            'confirm_new_password' => array_merge(passwordRules(false, false), ['required_with:new_password']),
        ], companyDataRules('company'));
    }

    public function messages()
    {
        return [];
    }
}

