<?php

namespace App\Enum\App;

use App\Enum\BaseEnum;

class UnitsEnum implements BaseEnum
{
    const PIECE = 0;
    const SQUARE_METER = 1;
    const HOUR = 2;
    const HECTARE = 3;
    const RUNNING_METER = 4;
    const KILOGRAM = 5;
    const TON = 6;
    const CUBIC_METER = 7;

    public static function getList($id = null)
    {
        $list = [
            self::PIECE => "szt.",
            self::SQUARE_METER => "m²",
            self::HOUR => "h",
            self::HECTARE => "ha",
            self::RUNNING_METER => "mb",
            self::KILOGRAM => "kg",
            self::TON => "t",
            self::CUBIC_METER => "m³",
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
