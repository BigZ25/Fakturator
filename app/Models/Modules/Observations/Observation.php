<?php

namespace App\Models\Modules\Observations;

use App\Enum\Modules\Observations\FrequencyEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Wildside\Userstamps\Userstamps;

class Observation extends Model
{
    use HasFactory, Userstamps, SoftDeletes;

    protected $fillable = [
        'frequency',
        'email_notification',
        'phone_notification',
        'browser_notification',
        'pushover_notification',
        'name'
    ];

    public function getFrequencyTextAttribute()
    {
        return FrequencyEnum::getList($this->frequency);
    }

    public function getEmailNotificationTextAttribute()
    {
        return $this->email_notification ? "Tak" : "Nie";
    }

    public function getPhoneNotificationTextAttribute()
    {
        return $this->phone_notification ? "Tak" : "Nie";
    }

    public function getBrowserNotificationTextAttribute()
    {
        return $this->browser_notification ? "Tak" : "Nie";
    }

    public function getPushoverNotificationTextAttribute()
    {
        return $this->pushover_notification ? "Tak" : "Nie";
    }

    public function getNumberOfInvoicesTextAttribute()
    {
        $numberOfNotViewedInvoices = $this->invoices()->where('was_viewed', '=', 0)->count();

        if ($numberOfNotViewedInvoices > 0) {
            return $this->invoices()->count() . ' (w tym ' . $numberOfNotViewedInvoices . ' nowych)';
        }

        return $this->invoices()->count();
    }

    public function  getNumberOfLinksAttribute()
    {
        return $this->links()->count();
    }

    public function invoices()
    {
        return $this->hasMany(ObservationInvoice::class);
    }

    public function links()
    {
        return $this->hasMany(ObservationLink::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getData()
    {
    }

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie obserwacji";
        $deletion->content = "Czy napewno chcesz usunąć obserwację " . $this->name . "?";
        $deletion->url = route('observations.destroy', $this->id);

        return $deletion;
    }

}
