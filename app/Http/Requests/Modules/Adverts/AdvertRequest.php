<?php

namespace App\Http\Requests\Modules\Invoices;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InvoiceRequest extends FormRequest
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
            'import' => ['required', 'numeric', 'in:0,1'],

            //z formularza
            'production' => requiredStringRules(250, 'import,0'),
            'production_number' => nullableStringRules(250),
            'condition' => requiredStringRules(50, 'import,0'),
            'name' => requiredStringRules(250, 'import,0'),
            'price' => requiredAmountRules('import,0'),
            'item_number' => requiredIntRules(true, 'import,0'),

            //z pliku
            'files' => ['required_if:import,1', 'array', 'min:1'],
            'files.*' => ['required_if:import,1'],
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

