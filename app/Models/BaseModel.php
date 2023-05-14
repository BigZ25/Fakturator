<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function fullAddressRaw()
    {
        return "CONCAT(address, ', ', postcode, ' ', city)";
    }

    public function getFullAddressAttribute()
    {
        return $this->address . ', ' . $this->postcode . ' ' . $this->city;
    }

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

    public static function getSelectList($text = 'name')
    {
        $list = array();
        $items = self::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        foreach ($items as $item) {
            array_push($list, ['id' => $item->id, 'text' => $item[$text]]);
        }

        return $list;
    }
}
