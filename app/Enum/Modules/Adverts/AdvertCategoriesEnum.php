<?php

namespace App\Enum\Modules\Adverts;

use App\Enum\BaseEnum;

class AdvertCategoriesEnum implements BaseEnum
{
    const ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS = 4062;
    const SPORT_AND_HOBBY_COMMUNITY = 6;
    const SPORT_AND_HOBBY_BOARD_GAMES = 1812;
    const SPORT_AND_HOBBY_OTHERS = 100;
    const FOR_CHILDREN_TOYS = 3093;

    public static function getList($id = null)
    {
        $list = [
            self::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS => "antyki i kolekcje -> kolekcje -> pozostałe",
            self::SPORT_AND_HOBBY_COMMUNITY => "sport i hobby -> społeczność",
            self::SPORT_AND_HOBBY_BOARD_GAMES => "sport i hobby -> gry planszowe",
            self::SPORT_AND_HOBBY_OTHERS => "sport i hobby -> pozostały sport i hobby",
            self::FOR_CHILDREN_TOYS => "dla dzieci -> zabawki -> pozostałe",
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
