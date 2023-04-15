<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class BaseModel extends Authenticatable
{
    public static function saveData($request, $id, $fkColumn, $items = 'items')
    {
        self::query()
            ->where($fkColumn, $id)
            ->delete();

        $items = $request->input($items);

        if ($items !== null) {
            foreach ($items as $item) {
                self::query()->insert($item + [$fkColumn => $id]);
            }
        }
    }
}
