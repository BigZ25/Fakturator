<?php
declare(strict_types=1);

namespace App\Enum;

interface BaseEnum
{
    public static function getList($id = null);
    public static function getSelectList($id = null);
}
