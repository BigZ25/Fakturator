<?php

use App\Enum\App\VatTypesEnum;
use Illuminate\Support\Facades\Route;

include('validator.php');
include('files.php');

function formatPriceShow($value)
{
    return number_format($value, 2, ',', ' ') . ' zł';
}

function formatDateShow($value)
{
    return date("d/m/Y", strtotime($value));
}

function formatDateTimeShow($value, $seconds = true)
{
    if ($seconds) {
        return date("d/m/Y H:i:s", strtotime($value));
    }

    return date("d/m/Y H:i", strtotime($value));
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

function passwordRegex(): string
{
    //  Ten regex wymaga, aby hasło spełniało następujące kryteria:
    //  Składało się z co najmniej 8 znaków.
    //  Zawierało co najmniej jedną małą literę ([a-z]).
    //  Zawierało co najmniej jedną dużą literę ([A-Z]).
    //  Zawierało co najmniej jedną cyfrę (\d).
    //  Zawierało co najmniej jeden znak specjalny spośród: @, $, !, %, *, ?, &.

    return '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
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

function nbsp($string)
{
    return str_replace(' ', '&nbsp;', $string);
}

function vatValue($netto, int $vatType)
{
    return match ($vatType) {
        VatTypesEnum::VAT_TYPE_23 => $netto * 0.23,
        VatTypesEnum::VAT_TYPE_8 => $netto * 0.08,
        VatTypesEnum::VAT_TYPE_5 => $netto * 0.05,
        default => 0,
    };
}

function entityId($string)
{
    $routeCollection = Route::getFacadeRoot()->getRoutes();
    $route = $routeCollection->match(request()->create($string, 'GET'));

    return (int)$route->parameters()['entity_id'];
}
