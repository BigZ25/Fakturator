<?php

namespace App\Console\Commands;

use App\Http\APIClient;
use App\Http\ObservationsAPIClient;
use App\Models\BrowserNotification;
use App\Models\Modules\Observations\Observation;
use App\Models\Modules\Observations\ObservationInvoice;
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
    protected $description = 'Checking new invoices';

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
                $countNewInvoices = 0;
                Log::channel('commands')->info('Checking observation ID:' . $observation->id . ' started');

                $links = $observation->links()->get();

                foreach ($links as $link) {
                    $response = ObservationsAPIClient::checkInvoices($link);

                    if ($response->isOk()) {
                        $invoices = json_decode($response->content(), true)['data'];

                        usort($invoices, function ($a, $b) {
                            return $b['lastRefreshTime'] <=> $a['lastRefreshTime'];
                        });

                        $newInvoices = [];

                        foreach ($invoices as $invoice) {
                            $observationInvoice = ObservationInvoice::query()
                                ->where('invoice_id', $invoice['id'])
                                ->where('website', $link->website)
                                ->whereIn('observation_id', $observationUserObservationsIds)
                                ->first();

                            if (!$observationInvoice) {
                                $newInvoice = ObservationInvoice::create([
                                    'observation_id' => $observation->id,
                                    'invoice_id' => $invoice['id'],
                                    'was_viewed' => 0,
                                    'link' => isset($invoice['url']) ? json_decode('{"url": "' . $invoice['url'] . '"}')->url : null,
                                    'name' => json_decode('{"title": "' . $invoice['title'] . '"}')->title,
                                    'website' => $link->website,
                                    'created_at' => $invoice['lastRefreshTime'],
                                    'price' => isset($invoice['price']['regularPrice']['value']) ? $invoice['price']['regularPrice']['value'] : null,
                                    'photo_link' => isset($invoice['photos'][0]) ? json_decode('{"photo_link": "' . $invoice['photos'][0] . '"}')->photo_link : null,
                                ]);

                                $newInvoices[] = $newInvoice;
                                $countNewInvoices++;
                            }
                        }

                        if ($observation->email_notification && count($newInvoices) > 0 && $observation->user->email) {
                            $message = view('modules.observations.mail', ['invoices' => $newInvoices])->render();

                            $subject = 'Nowe ogłoszenia w obserwacji ' . $observation->name . ' (' . count($newInvoices) . ')';
                            $headers = "Content-Type: text/html; charset=UTF-8\r\n";

                            mail($observation->user->email, $subject, $message, $headers);
                        }

                        if ($observation->browser_notification && count($newInvoices) > 0) {
                            if (count($newInvoices) > 1) {
                                $title = 'Nowe ogłoszenia (' . count($newInvoices) . ')';
                                $content = 'Sprawdź nowe ogłoszenia dla wyszukiwania ' . $observation->name;
                                $link = route('observations.show', $observation->id);
                            } else {
                                $title = 'Zobacz nowe ogłoszenie';
                                $content = priceShowFormat($newInvoices[0]['price']) . ' - ' . $newInvoices[0]['name'];
                                $link = $newInvoices[0]['link'];
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

                        if ($observation->pushover_notification && count($newInvoices) > 0) {
                            foreach ($newInvoices as $newInvoice) {
                                APIClient::sendPushoverNotification('<a href="' . $newInvoice->link . '">' . $newInvoice->name . ' (' . formatPriceShow($newInvoice->price) . ')</a>', 'Zobacz nowe ogłoszenie');
                            }
                        }
                    }
                }

                Log::channel('commands')->info('Checking observation ID:' . $observation->id . ' finished, ' . $countNewInvoices . ' new invoices');
            }
        }

        return false;
    }
}
