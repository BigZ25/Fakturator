<?php

namespace App\Http\Requests\Modules\Invoices;

use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InvoiceOperationRequest extends FormRequest
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
            'operation' => enumRules(InvoiceOperationsEnum::class),
            'mode' => ['required', 'in:0,1,2'],
            'id' => ['sometimes|required'],

            'confirmation' => ['sometimes', 'required', 'in:tak,TAK'],

            'ids' => ['required_if:mode,1,2', 'array', 'min:1'],
            'ids.*' => ['integer'],

            //kategoria przy wystawianiu
            'category' => ['sometimes', 'required_if:operation,0'],
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

