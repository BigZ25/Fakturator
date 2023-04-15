<?php

namespace App\Enum\OlxApi;

use App\Enum\BaseEnum;

class AdvertOlxStatusesEnum implements BaseEnum
{
    const NEW = "new";
    const ACTIVE = "active";
    const REMOVED_BY_USER = "removed_by_user";
    const DELETED_PERMANENTLY = "deleted_permanently";

    public static function getList($id = null)
    {
        $list = [
            self::NEW => "oczekujące",
            self::ACTIVE => "aktywne",
            self::REMOVED_BY_USER => "zakończone",
            self::DELETED_PERMANENTLY => "usunięte",
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
