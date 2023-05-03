<?php

function amountRules($required = true): array
{
    return [
        ($required === true ? 'required' : 'nullable'),
        amountRegexRule(),
    ];
}

function quantityRules($required = true): array
{
    return [
        ($required === true ? 'required' : 'nullable'),
        amountRegexRule(),
        'min:0'
    ];
}

function stringRules($required = true, int $length = 255): array
{
    return [
        ($required === true ? 'required' : 'nullable'),
        'string',
        'max:' . $length,
    ];
}

function dateRules($required = true, $after = null)
{
    $rules = [
        ($required === true ? 'required' : 'nullable'),
        'date',
    ];

    if ($after !== null) {
        $rules[] = 'after:' . $after;
    }

    return $rules;
}

function yearRules($required = true, $min = 1900, $max = null): array
{
    $rules = [
        ($required === true ? 'required' : 'nullable'),
        'digits:4',
        'integer',
        'min:' . $min,
    ];

    if ($max !== null) {
        $rules[] = 'max:' . $max;
    }

    return $rules;
}

function monthRules($required = true): array
{
    return [
        ($required === true ? 'required' : 'nullable'),
        'integer',
        'min:1',
        'max:12',
    ];
}

function integerRules($required = true, $min = null, $max = null, $gt = null): array
{
    $rules = [
        ($required === true ? 'required' : 'nullable'),
        'integer',
    ];

    if ($min !== null) {
        $rules[] = 'min:' . $min;
    }

    if ($max !== null) {
        $rules[] = 'max:' . $max;
    }

    if ($gt !== null) {
        $rules[] = 'gt:' . $gt;
    }

    return $rules;
}

function arrayRules($required = true, $min = 0): array
{
    $rules = [
        ($required === true ? 'required' : 'nullable'),
        'array',
        'min:' . $min
    ];

    return $rules;
}

function idRules($table, $column = 'id', $required = true, $different = null): array
{
    $rules = [
        ($required === true ? 'required' : 'nullable'),
        'integer',
        'exists:' . $table . ',' . $column,
    ];

    if ($different !== null) {
        $rules[] = 'different:' . $different;
    }

    return $rules;
}

function enumRules($class, $required = true): array
{
    $rules = [
        ($required === true ? 'required' : 'nullable'),
        'integer',
        'in:' . implode(',', array_keys($class::getList())),
    ];

    return $rules;
}

function boolRules($required = true): array
{
    $rules = [
        ($required === true ? 'required' : 'nullable'),
        'integer',
        'in:0,1',
    ];

    return $rules;
}

function notesRules($required = false, $length = 1000): array
{
    return stringRules($required, $length);
}

function nipRules($required = true): array
{
    return [
        ($required === true ? 'required' : 'nullable'),
        'numeric',
        'regex:/^[0-9]{10}$/'
    ];
}

function postcodeRules($required = true): array
{
    return [
        ($required === true ? 'required' : 'nullable'),
        'regex:/^[0-9]{2}-[0-9]{3}$/'
    ];
}

function emailRules($required = true): array
{
    return [
        ($required === true ? 'required' : 'nullable'),
        'email',
    ];
}

function companyDataRules($prefix = null)
{
    if ($prefix) {
        $prefix = $prefix . "_";
    }

    return [
        $prefix . 'nip' => nipRules(),
        $prefix . 'name' => stringRules(),
        $prefix . 'address' => stringRules(),
        $prefix . 'postcode' => postcodeRules(),
        $prefix . 'city' => stringRules(),
    ];
}
