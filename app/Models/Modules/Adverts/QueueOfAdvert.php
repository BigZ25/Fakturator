<?php

namespace App\Models\Modules\Adverts;

use App\Enum\Modules\Adverts\AdvertOperationsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueOfAdvert extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'advert_id',
        'params',
        'operation',
        'response_code',
        'response_message',
        'created_at',
        'executed_at',
    ];

    public function advert()
    {
        return $this->hasOne(Advert::class, 'id', 'advert_id')->withTrashed();
    }

    public function getOperationTextAttribute()
    {
        return AdvertOperationsEnum::getList($this->operation);
    }

    public function getSuccessTextAttribute()
    {
        if ($this->response_code === null) {
            return "-";
        }

        if ($this->response_code === 200) {
            return "Tak";
        }

        return "Nie";
    }

    public function getData()
    {

    }

    public static function searchField()
    {
        return "( SELECT CONCAT_WS(' ','Funko Pop',production,production_number,name,`condition`,CONCAT('#',item_number)) FROM adverts WHERE adverts.id = advert_id)";
    }

}
