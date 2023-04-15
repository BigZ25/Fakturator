<?php

namespace App\Enum\Modules\DescriptionTemplates;

use App\Enum\BaseEnum;

class DescriptionTemplateParametersEnum implements BaseEnum
{
    const FULL_NAME = 0;
    const CONDITION = 1;

    public static function getList($id = null)
    {
        $list = [
            self::FULL_NAME => "pelna_nazwa",
            self::CONDITION => "stan",
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

    public static function getTranslations()
    {
        return [
            self::FULL_NAME => ['text' => 'pelna_nazwa', 'translation' => 'Pełna nazwa ("Funko pop" + produkcja + numer + nazwa)'],
            self::CONDITION => ['text' => 'stan', 'translation' => 'Stan'],
        ];
    }

    public static function getAttributes()
    {
        return [
            self::FULL_NAME => ['text' => 'pelna_nazwa', 'attribute' => 'full_name'],
            self::CONDITION => ['text' => 'stan', 'attribute' => 'condition'],
        ];
    }
}
