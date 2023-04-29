<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'company_nip',
        'company_name',
        'company_address',
        'company_postcode',
        'company_city'
    ];

    protected $hidden = [
        'password',
    ];
}
