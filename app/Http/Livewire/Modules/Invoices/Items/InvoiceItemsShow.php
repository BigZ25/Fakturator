<?php

namespace App\Http\Livewire\Modules\Invoices\Items;

use App\Http\Livewire\BaseComponents\BaseItemsShowComponent;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;

class InvoiceItemsShow extends BaseItemsShowComponent
{
    public $invoice;

    public function mount(): void
    {
        parent::mount();

        $this->box_title = 'Pozycje na fakturze';
        $this->invoice = Invoice::find($this->parentId);

        $this->customSummary = [
            'netto_formatted' => formatPriceShow($this->invoice->netto),
            'vat_formatted' => formatPriceShow($this->invoice->vat),
            'brutto_formatted' => formatPriceShow($this->invoice->brutto)
        ];
        $this->footerTotalColumn = true;
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
            ->addColumn('price_formatted', function (InvoiceItem $item) {
                return formatPriceShow($item->price);
            })->addColumn('netto_formatted', function ($item) {
                return formatPriceShow($item->netto);
            })->addColumn('vat_formatted', function ($item) {
                return formatPriceShow($item->vat);
            })->addColumn('brutto_formatted', function ($item) {
                return formatPriceShow($item->brutto);
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Nazwa', 'name'),
            Column::make('Jednostka', 'unit'),
            Column::make('Stawka VAT', 'vat_type_name'),
            Column::make('Ilość', 'quantity'),
            Column::make('Cena', 'price_formatted'),
            Column::make('Netto', 'netto_formatted'),
            Column::make('VAT', 'vat_formatted'),
            Column::make('Brutto', 'brutto_formatted', 'brutto'),
        ];
    }
}
