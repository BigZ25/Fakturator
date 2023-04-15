<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'access_token',
        'refresh_token',
        'expires_in',
        'timestamp',
    ];

    public function getExpireTimestampAttribute()
    {
        return $this->timestamp + $this->expires_in;
    }

    public function getNeedRefreshAttribute()
    {
        if (currentUnixTimestamp() >= ($this->expire_timestamp - 60)) {
            return true;
        }

        return false;
    }

    public function getRefreshTokenExpiredAttribute()
    {
        if (currentUnixTimestamp() >= ($this->timestamp + 2592000 - 60)) {
            return true;
        }

        return false;
    }

    public static function current()
    {
        if (self::all()->count() === 0) {
            return null;
        }

        return self::all()->sortByDesc('id')->first();
    }
}
