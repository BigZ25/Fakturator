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

    public function getToPayAttribute()
    {
        if ($this->is_correction) {
            return $this->correctionParent->brutto - $this->brutto;
        }

        return $this->brutto;
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
            $array = explode('/', $userInvoice->number);
            $array[0] = strval((int)$array[0] + 1);

            return implode('/', $array);
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

    public function getHasRecipientAttribute()
    {
        return $this->recipient_nip || $this->recipient_name || $this->recipient_address || $this->recipient_postcode || $this->recipient_city;
    }

    public function getIsCorrectionAttribute()
    {
        return $this->correctionParent ? true : false;
    }

    public function getHaveCorrectionAttribute()
    {
        return $this->correctionChild ? true : false;
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    //korekta
    public function correctionChild()
    {
        return $this->belongsTo(Invoice::class, 'correction_invoice_id');
    }

    //oryginał
    public function correctionParent()
    {
        return $this->hasOne(Invoice::class, 'correction_invoice_id');
    }
}
