<?php

namespace App\Http;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvoiceImport implements ToCollection, WithHeadingRow
{
    private $invoices;

    public function collection(Collection $rows)
    {
        $invoices = [];

        foreach ($rows as $row) {
            if (!strlen(implode($row->toArray())) == 0) {
                $invoices[] = [
                    'production' => $row['produkcja'],
                    'production_number' => $row['numer'],
                    'name' => $row['nazwa'],
                    'price' => $row['cena'],
                    'item_number' => $row['egzemplarz'],
                    'condition' => $row['stan'],
                ];
            }
        }

        $this->invoices = $invoices;
    }

    public function getInvoices()
    {
        return $this->invoices;
    }
}

