<?php

namespace App\Models\Modules\Invoices;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Invoice extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'correction_invoice_id',
        'number',
        'send_email',
        'buyer_nip',
        'buyer_name',
        'buyer_address',
        'buyer_postcode',
        'buyer_city',
        'recipient_nip',
        'recipient_name',
        'recipient_address',
        'recipient_postcode',
        'recipient_city',
        'seller_nip',
        'seller_name',
        'seller_address',
        'seller_postcode',
        'seller_city',
        'sale_date',
        'issue_date',
        'payment_date',
        'paid_date',
        'payment_method',
        'is_printed',
        'is_send',
        'notes',
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
