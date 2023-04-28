<?php

namespace App\Models\Modules\Invoices;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Wildside\Userstamps\Userstamps;

class Invoice extends BaseModel
{
    use HasFactory, Userstamps, SoftDeletes;

    protected $fillable = [

    ];

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie faktury";
        $deletion->content = "Czy napewno chcesz usunąć fakturę " . $this->number . "?";
        $deletion->route = route('invoices.destroy', $this->id);

        return $deletion;
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

//    public static function searchField()
//    {
//        return "CONCAT_WS(' ','Funko Pop',production,production_number,name,`condition`,CONCAT('#',item_number))";
//    }
}
