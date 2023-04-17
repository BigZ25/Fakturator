<?php

namespace App\Enum\Modules\Invoices;

use App\Enum\BaseEnum;

class InvoiceStatusesEnum implements BaseEnum
{
    const NOT_POSTED = 0;
    const POSTED = 1;

    public static function getList($id = null)
    {
        $list = [
            self::NOT_POSTED => "nie wystawione",
            self::POSTED => "wystawione",
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
