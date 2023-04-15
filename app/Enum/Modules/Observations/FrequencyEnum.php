<?php

namespace App\Enum\Modules\Observations;

use App\Enum\BaseEnum;

class FrequencyEnum implements BaseEnum
{
    const EVERY_MINUTE = 0;
    const EVERY_TWO_MINUTES = 1;
    const EVERY_FIVE_MINUTES = 2;

    public static function getList($id = null)
    {
        $list = [
            self::EVERY_MINUTE => "co minutę",
            self::EVERY_TWO_MINUTES => "co dwie minuty",
            self::EVERY_FIVE_MINUTES => "co pięć minut",
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

        foreach ($items as $index => $item) {
            array_push($list, ['id' => $index, 'text' => $item]);
        }

        return $list;
    }
}
