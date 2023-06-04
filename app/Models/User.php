<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

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
        'company_city',
        'key',
        'is_active'
    ];

    protected $hidden = [
        'password',
    ];

    public function getCompanyDataCompleteAttribute()
    {
        return $this->company_nip && $this->company_name && $this->company_address && $this->company_postcode && $this->company_city;
    }

    public function getActivationLinkAttribute()
    {
        return route('account.activation', $this->key);
    }
}
