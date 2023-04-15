<?php

namespace App\Http\Requests\Modules\Observations;

use App\Enum\Modules\Observations\FrequencyEnum;
use App\Enum\Modules\Observations\WebsitesEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ObservationRequest extends FormRequest
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
            'frequency' => enumRules(FrequencyEnum::class),
            'email_notification' => boolRules(true),
            'phone_notification' => boolRules(true),
            'browser_notification' => boolRules(true),
            'pushover_notification' => boolRules(true),

            'links' => arrayRules(min: 1),
            'links.*.website' => enumRules(WebsitesEnum::class),
            'links.*.input_link' => stringRules(),
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

