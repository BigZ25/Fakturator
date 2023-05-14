<?php

namespace App\Http\Requests\Modules\Products;

use App\Enum\App\PaymentMethodsEnum;
use App\Enum\App\UnitsEnum;
use App\Enum\App\VatTypesEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'unit' => enumRules(UnitsEnum::class),
            'vat_type' => enumRules(VatTypesEnum::class),
            'price' => amountRules(),
            'quantity' => quantityRules(),
        ];
    }
}

