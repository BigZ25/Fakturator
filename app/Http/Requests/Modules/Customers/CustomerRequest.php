<?php

namespace App\Http\Requests\Modules\Customers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerRequest extends FormRequest
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
            'nip' => nipRules(),
            'name' => stringRules(),
            'address' => stringRules(),
            'postcode' => postcodeRules(),
            'city' => stringRules(),
            'email' => emailRules(false),
        ];
    }
}

