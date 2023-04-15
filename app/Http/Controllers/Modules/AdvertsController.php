<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;
use App\Enum\Modules\Adverts\AdvertOperationsEnum;
use App\Enum\Modules\Adverts\AdvertStatusesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Adverts\AdvertOperationRequest;
use App\Http\Requests\Modules\Adverts\AdvertRequest;
use App\Models\Modules\Adverts\Advert;
use App\Services\Modules\AdvertPhotosService;
use App\Services\Modules\AdvertsService;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdvertsController extends Controller
{
    public function store(AdvertRequest $request)
    {
        if ($request->has('import')) {
            if ($request->input('import') === "0") {
                $advert = Advert::create($request->validated() + ['status' => AdvertStatusesEnum::NOT_POSTED]);

                AdvertPhotosService::storePhotos($request, $advert);
                AppClass::addMessage('Ogłoszenie zostało zapisane');

                return response()->json(route('adverts.show', $advert->id));
            } elseif ($request->input('import') === "1") {
                AdvertsService::importAdverts($request);
                AppClass::addMessage('Ogłoszenia zostały zaimportowane');

                return response()->json(route('adverts.index'));
            }
        }

        return response()->json(route('adverts.index'));
    }

    public function update(AdvertRequest $request, Advert $advert)
    {
        $this->authorize('update', $advert);

        $advert->update($request->validated());

        AdvertPhotosService::storePhotos($request, $advert);
        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('adverts.show', $advert->id));
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function handleOperation(AdvertOperationRequest $request)
    {
        $counter = 0;
        $mode = (int)$request->input('mode');
        $operation = (int)$request->input('operation');
        $id = (int)$request->input('id');
        $ids = $request->input('ids');
        $params = $request->has('category') ? ['category' => $request->input('category')] : [];

        if ($mode === 0) {
            $ids = Advert::all()->pluck('id')->toArray();
        }

        foreach ($ids as $advertId) {
            $advert = Advert::find($advertId);

            if ($advert) {
                $this->authorize('operation', $advert);

                //jeśli ogłoszenie nie wystawione na OLX to odrazu usuwamy z wystawiacza
                if ($operation === AdvertOperationsEnum::DELETE && $advert->is_active === false) {
                    $advert->delete();
                } else {
                    if (AdvertsService::addToQueue($advert, $operation, $params) === true) {
                        $counter++;
                    };
                }
            } else {
                throw new HttpResponseException(response()->json(['message' => "Ogłoszenie #$advertId nie istnieje."], 403));
            }
        }

        if ($counter === count($ids)) {
            $prefix = "Wszystkie";
        } elseif ($counter < count($ids)) {
            $prefix = "Niektóre";
        } else {
            $prefix = "Żadne";
        }

        if ($counter !== 0) {
            if ($operation === AdvertOperationsEnum::DELETE) {
                $postfix = " Wkrótce zostaną usunięte.";
            } elseif ($operation === AdvertOperationsEnum::ADD_TO_OLX) {
                $postfix = " Wkrótce zostaną wystawione.";
            } elseif ($operation === AdvertOperationsEnum::MARK_AS_NOT_POSTED) {
                $postfix = " Wkrótce zostaną oznaczone.";
            }
        } else {
            $postfix = "";
        }

        $message = $prefix . " ogłoszenia zostały dodane do kolejki." . $postfix;

        AppClass::addMessage($message);

        if ($id) {
            return response()->json(route('adverts.show', $id));
        }

        return response()->json(route('adverts.index'));
    }
}
