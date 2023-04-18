<?php

namespace App\Enum\App;

use App\Enum\BaseEnum;

class VatTypesEnum implements BaseEnum
{
    const VAT_TYPE_23 = 0;
    const VAT_TYPE_8 = 1;
    const VAT_TYPE_5 = 2;
    const VAT_TYPE_0 = 3;
    const VAT_TYPE_ZW = 4;
    const VAT_TYPE_NP = 5;

    public static function getList($id = null)
    {
        $list = [
            self::VAT_TYPE_23 => "23%",
            self::VAT_TYPE_8 => "8%",
            self::VAT_TYPE_5 => "5%",
            self::VAT_TYPE_0 => "0%",
            self::VAT_TYPE_ZW => "zw.",
            self::VAT_TYPE_NP => "np.",
        ];

        if (!is_null($id)) {
            return $list[$id] ?? null;
        }

        return $list;
    }

    public static function getSelectList($id = null)
    {
        $list = array();
        $items = self::getList();

        foreach ($items as $index => $item)
        {
            array_push($list,['id' => $index, 'text' => $item]);
        }

        return $list;
    }
}
