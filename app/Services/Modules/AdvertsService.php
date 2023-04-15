<?php

namespace App\Services\Modules;

use App\Classes\App\AppClass;
use App\Enum\Modules\Adverts\AdvertCategoriesEnum;
use App\Enum\Modules\Adverts\AdvertStatusesEnum;
use App\Enum\Modules\Adverts\AdvertOperationsEnum;
use App\Enum\Modules\DescriptionTemplates\DescriptionTemplateParametersEnum;
use App\Enum\OlxApi\AdvertOlxStatusesEnum;
use App\Http\AdvertImport;
use App\Http\APIClient;
use App\Http\Requests\Modules\Adverts\AdvertRequest;
use App\Models\Modules\Adverts\Advert;
use App\Models\Modules\Adverts\QueueOfAdvert;
use App\Models\Modules\DescriptionTemplates\DescriptionTemplate;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class AdvertsService
{
    public static function importAdverts(AdvertRequest $request)
    {
        if ($request->hasFile('files')) {
            $allowedFileExtension = ['csv', 'xls', 'xlsx'];

            $files = $request->file('files');

            foreach ($files as $file) {

                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);

                if ($check === true) {
                    $import = new AdvertImport;
                    Excel::Import($import, $file);
                    $adverts = $import->getAdverts();
                    foreach ($adverts as $advert) {
                        Advert::create($advert + ['status' => AdvertStatusesEnum::NOT_POSTED]);
                    }
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    public static function addToQueue(Advert $advert, $operation, $params = [])
    {
        $data = [
            'advert_id' => $advert->id,
            'operation' => $operation,
            'params' => json_encode($params),
            'created_at' => currentDateTime(),
        ];

        QueueOfAdvert::create($data);

        return true;
    }

    /**
     * @throws Exception
     */
    public static function addToOlx($id, int $category = AdvertCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS)
    {
        $advert = Advert::find($id);

        if ($advert && !$advert->is_active) {
            $data = AdvertsService::prepareData($advert, $category);
            $response = APIClient::addAdvert($data);

            if ($response->isOk() === true) {
                $data = $response->getOriginalContent()['data'];

                $advert->update([
                    'olx_id' => $data['id'],
                    'olx_link' => $data['url'],
                    'olx_status' => $data['status'],
                    'status' => AdvertStatusesEnum::POSTED,
                ]);
            }

            return [
                'code' => $response->getStatusCode(),
                'message' => $response->isOk() ? $response->statusText() : $response->getData(),
            ];
        }

        return false;
    }

    public static function removeFromOlx($id)
    {
        $advert = Advert::find($id);

        if ($advert) {
            $response = APIClient::removeAdvert($advert->olx_id);

            if ($response->isOk() === true) {
                $advert->update([
                    'status' => AdvertStatusesEnum::NOT_POSTED,
                    'olx_status' => AdvertOlxStatusesEnum::REMOVED_BY_USER,
                ]);

                $advert->delete();
            }

            return [
                'code' => $response->getStatusCode(),
                'message' => $response->statusText(),
            ];
        }

        return false;
    }

    public static function markAsNotPosted($id)
    {
        $advert = Advert::find($id);

        if ($advert) {
            $advert->update([
                'olx_link' => null,
                'olx_status' => null,
                'olx_id' => null,
                'last_olx_update_at' => null,
                'status' => AdvertStatusesEnum::NOT_POSTED,
            ]);

            return [
                'code' => 200,
                'message' => 'OK',
            ];
        }

        return false;
    }

    private static function prepareData($advert, $category): array
    {
        $images = [];

        foreach ($advert->photos as $photo) {
            $images[] = [
                'url' => route('adverts.photos.show', [$photo->advert_id, $photo->id]),
            ];
        }

        $description = DescriptionTemplate::first();

        if (!$description) {
            throw new Exception("Brak wzoru opisu");
        } else {
            $text = $description->text;
            $parameters = DescriptionTemplateParametersEnum::getAttributes();

            foreach ($parameters as $parameter) {
                if (!$advert[$parameter['attribute']]) {
                    throw new Exception("Pusta wartość dla parametru " . $parameter['text']);
                }
                $text = str_replace("<" . $parameter['text'] . ">", $advert[$parameter['attribute']], $text);
            }
        }

        return [
            'title' => $advert->full_name_with_item_number,
            'description' => $text,
            'category_id' => $category,
            'advertiser_type' => 'private',
            'contact' => [
                'name' => 'Mateusz',
            ],
            'location' => [
                'city_id' => '130999',
            ],
            'price' => [
                'value' => $advert->price,
                'currency' => 'PLN',
            ],
            'attributes' => [
                [
                    //przedmiot nowy
                    'code' => 'state',
                    'value' => 'new',
                ],
            ],
            'images' => $images,
        ];
    }
}
