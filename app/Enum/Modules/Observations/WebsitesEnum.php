<?php

namespace App\Enum\Modules\Observations;

use App\Enum\BaseEnum;

class WebsitesEnum implements BaseEnum
{
    const OLX = 0;
    const ALLEGRO = 1;
    const EBAY = 2;

    public static function getList($id = null)
    {
        $list = [
            self::OLX => "OLX",
//            self::ALLEGRO => "Allegro",
//            self::EBAY => "eBay",
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
