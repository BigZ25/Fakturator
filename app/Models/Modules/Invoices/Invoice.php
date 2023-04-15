<?php

namespace App\Models\Modules\Invoices;

use App\Enum\Modules\Adverts\AdvertStatusesEnum;
use App\Enum\OlxApi\AdvertOlxStatusesEnum;
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
        return $this->status === AdvertStatusesEnum::POSTED;
    }

    public function getStatusTextAttribute()
    {
        return AdvertStatusesEnum::getList($this->status);
    }

    public function getOlxStatusTextAttribute()
    {
        if (!$this->olx_status) {
            return null;
        }

        return AdvertOlxStatusesEnum::getList($this->olx_status);
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

    public function getIsInQueueAttribute()
    {
        return QueueOfAdvert::query()
                ->where('advert_id', $this->id)
                ->whereNull('executed_at')
                ->count() > 0;
    }

    public function photos()
    {
        return $this->hasMany(AdvertPhoto::class);
    }

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie ogłoszenia";
        $deletion->content = "Czy napewno chcesz usunąć ogłoszenie " . $this->full_name . "?";
        $deletion->url = route('adverts.delete');

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
