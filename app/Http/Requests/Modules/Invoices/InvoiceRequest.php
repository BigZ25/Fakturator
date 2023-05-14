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
            'number' => array_merge(stringRules(), [Rule::unique('invoices')->where('user_id', auth()->user()->id)->ignore($this->invoice->id ?? null)]),

            //dane nabywcy
            'buyer_customer_id' => idRules('customers', required: false),
            'buyer_nip' => nipRules(),
            'buyer_name' => stringRules(),
            'buyer_address' => stringRules(),
            'buyer_postcode' => postcodeRules(),
            'buyer_city' => stringRules(),

            //dane odbiory
            'recipient_nip' => nipRules(false),
            'recipient_name' => stringRules(false),
            'recipient_address' => stringRules(false),
            'recipient_postcode' => postcodeRules(false),
            'recipient_city' => stringRules(false),

            //daty
            'sale_date' => dateRules(),
            'issue_date' => dateRules(),
            'payment_date' => dateRules(),
            'paid_date' => dateRules(false),

            'send_email' => emailRules(false),
            'payment_method' => enumRules(PaymentMethodsEnum::class),
            'is_printed' => boolRules(),
            'is_send' => boolRules(),
            'notes' => stringRules(false),

            //items
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => idRules('products', required: false),
            'items.*.name' => stringRules(),
            'items.*.unit' => enumRules(UnitsEnum::class),
            'items.*.vat_type' => enumRules(VatTypesEnum::class),
            'items.*.quantity' => quantityRules(),
            'items.*.price' => amountRules(),
        ];
    }
}

