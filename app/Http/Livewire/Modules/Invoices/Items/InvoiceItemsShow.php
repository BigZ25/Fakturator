<?php

namespace App\Http\Livewire\Modules\Invoices\Items;

use App\Http\Livewire\BaseComponents\BaseItemsShowComponent;
use App\Models\Modules\Invoices\InvoiceItem;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;

class InvoiceItemsShow extends BaseItemsShowComponent
{
    public function mount(): void
    {
        parent::mount();

        $this->box_title = 'Pozycje na fakturze';
    }

    public function datasource(): Builder
    {
        return InvoiceItem::query()->where('invoice_id', '=', $this->parentId);
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('unit')
            ->addColumn('vat_type_name')
            ->addColumn('quantity')
            ->addColumn('price');
    }

    public function columns(): array
    {
        return [
            Column::make('Nazwa', 'name'),
            Column::make('Jednostka', 'unit'),
            Column::make('VAT', 'vat_type_name'),
            Column::make('Ilość', 'quantity'),
            Column::make('Cena', 'price'),
        ];
    }
}
