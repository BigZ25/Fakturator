<?php

namespace App\Http\Requests\Modules\Invoices;

use App\Enum\App\PaymentMethodsEnum;
use App\Enum\App\UnitsEnum;
use App\Enum\App\VatTypesEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

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
            'number' => stringRules(),
            'buyer_nip' => nipRules(),
            'buyer_name' => stringRules(),
            'buyer_address' => stringRules(),
            'buyer_postcode' => postcodeRules(),
            'buyer_city' => stringRules(),
            //'buyer_email' => emailRules(),
            'sale_date' => dateRules(),
            'issue_date' => dateRules(),
            'payment_date' => dateRules(),
            'paid_date' => dateRules(),
            'payment_method' => enumRules(PaymentMethodsEnum::class),
            'is_printed' => boolRules(),
            'is_send' => boolRules(),
            'notes' => stringRules(false),

            //items
            'item.*.name' => stringRules(),
            'item.*.unit' => enumRules(UnitsEnum::class),
            'item.*.vat_type' => enumRules(VatTypesEnum::class),
            'item.*.quantity' => amountRules(),
            'item.*.price' => amountRules(),
            'item.*.netto' => amountRules(),
            'item.*.vat' => amountRules(),
            'item.*.brutto' => amountRules(),
        ];
    }
}

