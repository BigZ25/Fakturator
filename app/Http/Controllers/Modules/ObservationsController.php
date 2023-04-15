<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Observations\ObservationRequest;
use App\Models\Modules\Observations\Observation;
use App\Services\Modules\ObservationsService;

class ObservationsController extends Controller
{
    public function store(ObservationRequest $request)
    {
        $observation = ObservationsService::handleRequest($request);

        return response()->json(route('observations.show', $observation->id));
    }

    public function update(ObservationRequest $request, Observation $observation)
    {
        $observation = ObservationsService::handleRequest($request, $observation);

        return response()->json(route('observations.show', $observation->id));
    }

    public function destroy(Observation $observation)
    {
        $observation->delete();

        AppClass::addMessage('Obserwacja została usunięta');

        return response()->json(route('observations.index'));
    }
}
