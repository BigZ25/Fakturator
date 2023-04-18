<?php

namespace App\Enum\App;

use App\Enum\BaseEnum;

class UnitsEnum implements BaseEnum
{
    const SERVICE = 0;
    const PIECE = 1;
    const SQUARE_METER = 2;
    const HOUR = 3;
    const HECTARE = 4;
    const RUNNING_METER = 5;
    const KILOMETER = 6;
    const KILOGRAM = 7;
    const TON = 8;
    const CUBIC_METER = 9;
    const MONTH = 10;

    public static function getList($id = null)
    {
        $list = [
            self::SERVICE => "usł.",
            self::PIECE => "szt.",
            self::SQUARE_METER => "m²",
            self::HOUR => "h",
            self::HECTARE => "ha",
            self::RUNNING_METER => "mb",
            self::KILOMETER => "km",
            self::KILOGRAM => "kg",
            self::TON => "t",
            self::CUBIC_METER => "m³",
            self::MONTH => "m-c",
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
