<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
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
