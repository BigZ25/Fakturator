<?php

namespace App\Console\Commands;

use App\Http\APIClient;
use App\Http\ObservationsAPIClient;
use App\Models\BrowserNotification;
use App\Models\Modules\Observations\Observation;
use App\Models\Modules\Observations\ObservationAdvert;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckObservation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'observations:check {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking new adverts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $observationId = $this->argument('id');

        if ($observationId !== null) {
            $observation = Observation::find($observationId);

            $observationUserObservationsIds = $observation->user
                ->observations
                ->pluck('id')
                ->toArray();

            if ($observation) {
                $countNewAdverts = 0;
                Log::channel('commands')->info('Checking observation ID:' . $observation->id . ' started');

                $links = $observation->links()->get();

                foreach ($links as $link) {
                    $response = ObservationsAPIClient::checkAdverts($link);

                    if ($response->isOk()) {
                        $adverts = json_decode($response->content(), true)['data'];

                        usort($adverts, function ($a, $b) {
                            return $b['lastRefreshTime'] <=> $a['lastRefreshTime'];
                        });

                        $newAdverts = [];

                        foreach ($adverts as $advert) {
                            $observationAdvert = ObservationAdvert::query()
                                ->where('advert_id', $advert['id'])
                                ->where('website', $link->website)
                                ->whereIn('observation_id', $observationUserObservationsIds)
                                ->first();

                            if (!$observationAdvert) {
                                $newAdvert = ObservationAdvert::create([
                                    'observation_id' => $observation->id,
                                    'advert_id' => $advert['id'],
                                    'was_viewed' => 0,
                                    'link' => isset($advert['url']) ? json_decode('{"url": "' . $advert['url'] . '"}')->url : null,
                                    'name' => json_decode('{"title": "' . $advert['title'] . '"}')->title,
                                    'website' => $link->website,
                                    'created_at' => $advert['lastRefreshTime'],
                                    'price' => isset($advert['price']['regularPrice']['value']) ? $advert['price']['regularPrice']['value'] : null,
                                    'photo_link' => isset($advert['photos'][0]) ? json_decode('{"photo_link": "' . $advert['photos'][0] . '"}')->photo_link : null,
                                ]);

                                $newAdverts[] = $newAdvert;
                                $countNewAdverts++;
                            }
                        }

                        if ($observation->email_notification && count($newAdverts) > 0 && $observation->user->email) {
                            $message = view('modules.observations.mail', ['adverts' => $newAdverts])->render();

                            $subject = 'Nowe ogłoszenia w obserwacji ' . $observation->name . ' (' . count($newAdverts) . ')';
                            $headers = "Content-Type: text/html; charset=UTF-8\r\n";

                            mail($observation->user->email, $subject, $message, $headers);
                        }

                        if ($observation->browser_notification && count($newAdverts) > 0) {
                            if (count($newAdverts) > 1) {
                                $title = 'Nowe ogłoszenia (' . count($newAdverts) . ')';
                                $content = 'Sprawdź nowe ogłoszenia dla wyszukiwania ' . $observation->name;
                                $link = route('observations.show', $observation->id);
                            } else {
                                $title = 'Zobacz nowe ogłoszenie';
                                $content = priceShowFormat($newAdverts[0]['price']) . ' - ' . $newAdverts[0]['name'];
                                $link = $newAdverts[0]['link'];
                            }

                            $browserNotification = BrowserNotification::create([
                                'user_id' => $observation->user->id,
                                'was_viewed' => 0,
                                'was_showed' => 0,
                                'title' => $title,
                                'content' => $content,
                                'link' => $link,
                            ]);
                        }

                        if ($observation->pushover_notification && count($newAdverts) > 0) {
                            foreach ($newAdverts as $newAdvert) {
                                APIClient::sendPushoverNotification('<a href="' . $newAdvert->link . '">' . $newAdvert->name . ' (' . formatPriceShow($newAdvert->price) . ')</a>', 'Zobacz nowe ogłoszenie');
                            }
                        }
                    }
                }

                Log::channel('commands')->info('Checking observation ID:' . $observation->id . ' finished, ' . $countNewAdverts . ' new adverts');
            }
        }

        return false;
    }
}
