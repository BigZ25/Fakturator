<?php

namespace App\Http\Requests\Modules\DescriptionTemplates;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DescriptionTemplateRequest extends FormRequest
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
            'text' => requiredStringRules(1000),
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

