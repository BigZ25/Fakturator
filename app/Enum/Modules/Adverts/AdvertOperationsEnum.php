<?php

namespace App\Enum\Modules\Invoices;

use App\Enum\BaseEnum;

class InvoiceOperationsEnum implements BaseEnum
{
    const ADD_TO_OLX = 0;
    const DELETE = 1;
    const MARK_AS_NOT_POSTED = 2;

    public static function getList($id = null)
    {
        $list = [
            self::ADD_TO_OLX => "wystaw",
            self::DELETE => "usuń",
            self::MARK_AS_NOT_POSTED => "oznacz jako nie wystawione",
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
