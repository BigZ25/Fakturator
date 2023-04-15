<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AccountSettingsRequest extends FormRequest
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
            'name' => requiredStringRules(),
            'surname' => requiredStringRules(),
            'login' => array_merge(requiredStringRules(), ['unique:users,login,' . auth()->id()]),
            'email' => array_merge(requiredStringRules(), ['unique:users,email,' . auth()->id()]),
            'phone' => array_merge(requiredStringRules(), ['unique:users,phone,' . auth()->id()]),
            'new_password' => array_merge(nullableStringRules(), ['min:8']),//'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ];
    }

    public function messages()
    {
        $messages = [];

        foreach ($this->rules() as $key => $field) {
            foreach ($field as $rule) {
                $rule_tmp = removeParameters($rule);
                $messages[$key . "." . $rule_tmp] = __('validation.' . $rule_tmp);
            }
        }

        //$messages['new_password.regex'] = 'Hasło musi się zawierać: conajmniej jedną dużą literę, conajmniej jedną małą literę, conajmniej jedną cyfrę, conajmniej jeden znak specjalny';

        return $messages;
    }
}

