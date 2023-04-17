<?php

namespace App\Models\Modules\Invoices;

use App\Enum\Modules\Invoices\InvoiceStatusesEnum;
use App\Enum\OlxApi\InvoiceOlxStatusesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Wildside\Userstamps\Userstamps;

class Invoice extends Model
{
    use HasFactory, Userstamps, SoftDeletes;

    protected $fillable = [
        'production',
        'name',
        'production_number',
        'price',
        'item_number',
        'status',
        'condition',
        'olx_id',
        'olx_link',
        'olx_status',
        'last_olx_update_at',
    ];

    public function getFullNameAttribute()
    {
        if ($this->production_number === null) {
            return 'Funko Pop ' . $this->production . ' ' . $this->name;
        }

        return 'Funko Pop ' . $this->production . ' ' . $this->production_number . ' ' . $this->name;
    }

    public function getFullNameWithItemNumberAttribute()
    {
        return $this->full_name . ' #' . $this->item_number;
    }

    public function getIsActiveAttribute()
    {
        return $this->status === InvoiceStatusesEnum::POSTED;
    }

    public function getStatusTextAttribute()
    {
        return InvoiceStatusesEnum::getList($this->status);
    }

    public function getOlxStatusTextAttribute()
    {
        if (!$this->olx_status) {
            return null;
        }

        return InvoiceOlxStatusesEnum::getList($this->olx_status);
    }

    public function getPhotosAttribute()
    {
        return $this->photos()->get();
    }

    public function getPhotosCountAttribute()
    {
        return $this->photos()->count();
    }

    public function getPhotosCountTextAttribute()
    {
        return $this->photos()->count() . ' / 8';
    }

    public function photos()
    {
        return $this->hasMany(InvoicePhoto::class);
    }

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie ogłoszenia";
        $deletion->content = "Czy napewno chcesz usunąć ogłoszenie " . $this->full_name . "?";
        $deletion->url = route('invoices.delete');

        return $deletion;
    }

    public function getData()
    {

    }

    public static function searchField()
    {
        return "CONCAT_WS(' ','Funko Pop',production,production_number,name,`condition`,CONCAT('#',item_number))";
    }
}
