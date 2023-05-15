<?php

namespace App\Models\Modules\Invoices;

use App\Enum\App\UnitsEnum;
use App\Models\BaseModel;
use Illuminate\Support\Collection;

class InvoiceItem extends BaseModel
{
    protected $fillable = [
        'invoice_id',
        'product_id',
        'name',
        'unit',
        'vat_type',
        'quantity',
        'price',
    ];

    protected $casts = [
        'quantity' => 'float',
        'price' => 'float',
    ];

    public function getUnitNameAttribute()
    {
        return UnitsEnum::getList($this->unit);
    }

    public function getNettoAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function getVatAttribute()
    {
        return vatValue($this->netto, $this->vat_type);
    }

    public function getBruttoAttribute()
    {
        return $this->netto + $this->vat;
    }

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie kolekcji";
        $deletion->content = "Czy napewno chcesz pozycję " . $this->name . "?";
        $deletion->route = route('invoices.items.destroy', [$this->invoice_id, $this->id]);

        return $deletion;
    }
}
