<?php

namespace App\Http\Livewire\Modules\Invoices\Items;

use App\Enum\App\UnitsEnum;
use App\Enum\App\VatTypesEnum;
use App\Http\Livewire\BaseComponents\BaseItemsFormComponent;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use App\Models\Modules\Products\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoiceItemsForm extends BaseItemsFormComponent
{
    use  AuthorizesRequests;

    public $totalNetto;
    public $totalVat;
    public $totalBrutto;
    public $products;

    public function mount(?int $invoiceId, string $label = 'Pozycje na fakturze', bool $onlyShow = false)
    {
        $this->view_path = 'modules.invoices.items.form';
        $this->label = $label;
        $this->onlyShow = $onlyShow;
        $this->lists = [
            'units' => UnitsEnum::getSelectList(),
            'vat_types' => VatTypesEnum::getSelectList(),
            'products' => Product::getSelectList(),
        ];
        $this->products = Product::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        if ($invoiceId) {
            $invoice = Invoice::find($invoiceId);
            $this->items = $invoice->items->toArray();
        } else {
            $this->items = [];
        }
    }

    public function render()
    {
        $this->totalNetto = 0;
        $this->totalVat = 0;
        $this->totalBrutto = 0;

        foreach ($this->items as $index => $item) {
            $netto = $item['quantity'] * $item['price'];
            $vat = vatValue($netto, (int)$item['vat_type']);
            $brutto = $netto + $vat;

            $this->totalNetto += $netto;
            $this->totalVat += $vat;
            $this->totalBrutto += $brutto;

            $this->items[$index]['netto'] = $netto;
            $this->items[$index]['vat'] = $vat;
            $this->items[$index]['brutto'] = $brutto;

            $this->checkItemName($item, $index);
        }

        return parent::render();
    }

    public function addItem()
    {
        $this->items[] = array_merge(array_fill_keys((new InvoiceItem())->getFillable(), null), ['connect' => true]);
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    private function checkItemName($item, $index)
    {
        if (!isset($this->items[$index]['connect'])) {
            $this->items[$index]['connect'] = $this->items[$index]['product_id'] ?? false;
        }

        if ((bool)$this->items[$index]['connect'] === true) {
            $product = $this->products->firstWhere('name', '=', $item['name']);

            if ($product) {
                $this->items[$index]['product_id'] = $product->id;
                $this->items[$index]['unit'] = $product->unit;
                $this->items[$index]['quantity'] = $product->quantity;
                $this->items[$index]['vat_type'] = $product->vat_type;
                $this->items[$index]['price'] = $product->price;
            } else {
                $this->items[$index]['product_id'] = null;
            }
        }
    }

    public function setLock($index)
    {
        $this->items[$index]['connect'] = !(bool)$this->items[$index]['connect'];

        if ($this->items[$index]['connect'] === false) {
            $this->items[$index]['product_id'] = null;
        }
    }
}
