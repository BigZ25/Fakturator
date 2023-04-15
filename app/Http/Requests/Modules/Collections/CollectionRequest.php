<?php

namespace App\Http\Requests\Modules\Collections;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CollectionRequest extends FormRequest
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
            'name' => stringRules(true, 250),
            'description' => stringRules(false, 500),
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

        return $messages;
    }
}

