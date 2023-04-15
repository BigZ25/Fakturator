<?php

namespace App\Models;

use App\Models\Modules\Observations\Observation;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function observations()
    {
        return $this->hasMany(Observation::class,'created_by');
    }
}
