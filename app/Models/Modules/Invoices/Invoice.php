<?php

namespace App\Models\Modules\Invoices;

use App\Enum\App\PaymentMethodsEnum;
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

    public function getPaymentMethodNameAttribute()
    {
        return PaymentMethodsEnum::getList($this->payment_method);
    }

    public function getIsPrintedTextAttribute()
    {
        return $this->is_printed ? "tak" : "nie";
    }

    public function getIsSendTextAttribute()
    {
        return $this->is_send ? "tak" : "nie";
    }

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie faktury";
        $deletion->content = "Czy napewno chcesz usunąć fakturę " . $this->number . "?";
        $deletion->route = route(self::destroyRoute(), $this->id);

        return $deletion;
    }

    public static function destroyRoute()
    {
        return 'invoices.destroy';
    }

    public static function nextNumber($userId)
    {
        $phrase = date('m') . '/' . date('Y');

        $userInvoice = self::query()
            ->where('user_id', $userId)
            ->where('number', 'like', '%' . $phrase . '%')
            ->orderByDesc('number')
            ->first();

        if ($userInvoice) {
            return $userInvoice->number;
        } else {
            return '1/' . $phrase;
        }
    }

    public function getNettoAttribute()
    {
        return $this->items->sum('netto');
    }

    public function getVatAttribute()
    {
        return $this->items->sum('vat');
    }

    public function getBruttoAttribute()
    {
        return $this->items->sum('brutto');
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function correction()
    {
        if ($this->correction_invoice_id) {
            return Invoice::find($this->correction_invoice_id);
        }

        return null;
    }
}
