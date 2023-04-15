<?php

namespace App\Models\Modules\Observations;

use App\Enum\Modules\Observations\WebsitesEnum;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObservationLink extends BaseModel
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'observation_id',
        'website',
        'input_link',
    ];

    public function Observation()
    {
        return $this->belongsTo(Observation::class);
    }

    public function getWebsiteTextAttribute()
    {
        return WebsitesEnum::getList($this->website);
    }

    public function getData()
    {

    }
}
