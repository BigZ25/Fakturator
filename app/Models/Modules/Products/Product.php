<?php

namespace App\Models\Modules\Products;

use App\Enum\App\VatTypesEnum;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use function Symfony\Component\Translation\t;

class Product extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'unit',
        'vat_type',
        'quantity',
        'price'
    ];

    public static function nettoRaw()
    {
        return "price";
    }

    public static function vatTypeNameRaw()
    {
        $string = "";
        $brackets = "";

        foreach (VatTypesEnum::getList() as $key => $item) {
            $string .= "IF(vat_type = " . $key . ", '" . $item . "',";
            $brackets .= ")";
        }

        return $string . " null" . $brackets;
    }

    public static function vatRaw()
    {
        return "IF(vat_type = " . VatTypesEnum::VAT_TYPE_5 . ",price*0.05,
        IF(vat_type = " . VatTypesEnum::VAT_TYPE_8 . ",price*0.08,
        IF(vat_type = " . VatTypesEnum::VAT_TYPE_23 . ",price*0.23,0)))";
    }

    public static function bruttoRaw()
    {
        return "price + " . self::vatRaw();
    }

    public function getNettoAttribute()
    {
        return $this->price;
    }

    public function getVatTypeNameAttribute()
    {
        return VatTypesEnum::getList($this->vat_type);
    }

    public function getVatAttribute()
    {
        $vat = 0.0;

        if ($this->vat_type === VatTypesEnum::VAT_TYPE_5) {
            $vat = 0.05;
        } elseif ($this->vat_type === VatTypesEnum::VAT_TYPE_8) {
            $vat = 0.08;
        } elseif ($this->vat_type === VatTypesEnum::VAT_TYPE_23) {
            $vat = 0.23;
        }

        return $this->netto * $vat;
    }

    public function getBruttoAttribute()
    {
        return $this->netto + $this->vat;
    }

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie produktu";
        $deletion->content = "Czy napewno chcesz usunąć produkt " . $this->name . "?";
        $deletion->route = route('products.destroy', $this->id);

        return $deletion;
    }
}
