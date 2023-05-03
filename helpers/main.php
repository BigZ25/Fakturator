<?php

use App\Http\APIClient;
use App\Models\Code;

include('validator.php');
include('files.php');

function priceShowFormat($value)
{
    return number_format($value, 2, ',', ' ') . ' zł';
}

function todayDate()
{
    return date("Y-m-d");
}

function currentDateTime()
{
    return date("Y-m-d H:i:s");
}

function currentUnixTimestamp()
{
    return strtotime(date("Y-m-d H:i:s"));
}

function amountRegexRule(): string
{
    return 'regex:/^\d{1,10}(\.\d{1,2})?$/';
}

function required($if)
{
    $required = 'required';

    if ($if !== null) {
        $required = 'required_if:' . $if;
    }

    return $required;
}

//usuwa parametry z reguły walidacji np. "required_if:id,1" -> "required"
function removeParameters($rule)
{
    $pos = strpos($rule, ":");

    if ($pos === false) {
        return $rule;
    }

    return substr($rule, 0, $pos);
}

function selectedCheckboxesIds($checkboxes)
{
    $ids = [];

    if ($checkboxes) {
        foreach ($checkboxes as $checkbox) {
            if (isset($checkbox['value']) && $checkbox['value'] === 1) {
                $ids[] = $checkbox['db_id'];
            }
        }
    }

    return $ids;
}

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB');

    if ($size == 0) {
        return "0 MB";
    } else {
        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }
}

function formatPriceShow($price)
{
    if ($price !== null) {
        return number_format($price, 2, ',', ' ') . ' zł';
    }

    return null;
}

function formatPriceEdit($price)
{
    return number_format($price, 2, '.', '');
}

function prepareForRow(array $items, $textColName, $labelColName = null)
{
    if (!empty($items)) {
        $rows = [];

        foreach ($items as $item) {
            $row = [];
            $row['text'] = $item[$textColName];
            if ($labelColName !== null) {
                $row['label'] = $item[$labelColName];
            }

            $rows[] = $row;
        }

        return $rows;
    } else {
        return [];
    }

}

function currentDate()
{
    return date("Y-m-d");
}

function currentYear()
{
    return ((int)date('Y'));
}

function nextYear()
{
    return ((int)date('Y') + 1);
}

function emptyModel($class)
{
    return array_fill_keys(($class)->getFillable(), null);
}

function buttonClass($color)
{
    return 'focus:outline-none inline-flex justify-center items-center transition-all ease-in duration-100 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-' . $color . '-500 text-white bg-' . $color . '-500 hover:bg-' . $color . '-600 hover:ring-' . $color . '-600 dark:ring-offset-slate-800 dark:bg-' . $color . '-700 dark:ring-' . $color . '-700 dark:hover:bg-' . $color . '-600 dark:hover:ring-' . $color . '-600';
}


