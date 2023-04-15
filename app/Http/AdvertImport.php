<?php

namespace App\Http;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdvertImport implements ToCollection, WithHeadingRow
{
    private $adverts;

    public function collection(Collection $rows)
    {
        $adverts = [];

        foreach ($rows as $row) {
            if (!strlen(implode($row->toArray())) == 0) {
                $adverts[] = [
                    'production' => $row['produkcja'],
                    'production_number' => $row['numer'],
                    'name' => $row['nazwa'],
                    'price' => $row['cena'],
                    'item_number' => $row['egzemplarz'],
                    'condition' => $row['stan'],
                ];
            }
        }

        $this->adverts = $adverts;
    }

    public function getAdverts()
    {
        return $this->adverts;
    }
}

