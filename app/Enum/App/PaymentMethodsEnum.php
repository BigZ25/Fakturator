<?php

namespace App\Enum\App;

use App\Enum\BaseEnum;

class PaymentMethodsEnum implements BaseEnum
{
    const TRANSFER = 0;
    const CASH = 1;
    const CARD = 2;

    public static function getList($id = null)
    {
        $list = [
            self::TRANSFER => "przelew",
            self::CASH => "gotówka",
            self::CARD => "karta płatnicza",
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
