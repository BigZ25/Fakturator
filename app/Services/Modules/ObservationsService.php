<?php

namespace App\Services\Modules;

use App\Classes\App\AppClass;
use App\Http\Requests\Modules\Observations\ObservationRequest;
use App\Models\Modules\Observations\Observation;
use App\Models\Modules\Observations\ObservationLink;

class ObservationsService
{
    public static function handleRequest(ObservationRequest $request, Observation $observation = null)
    {
        if ($observation === null) {
            $observation = Observation::create($request->validated());
            ObservationLink::saveData($request, $observation->id, 'observation_id', 'links');
            $message = 'Obserwacja została utworzona';
        } else {
            $observation->update($request->validated());
            ObservationLink::saveData($request, $observation->id, 'observation_id', 'links');
            $message = 'Zmiany zostały zapisane';
        }

        AppClass::addMessage($message);

        return $observation;
    }
}
