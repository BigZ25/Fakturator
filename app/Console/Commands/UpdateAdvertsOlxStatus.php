<?php

namespace App\Console\Commands;

use App\Enum\Modules\Adverts\AdvertStatusesEnum;
use App\Enum\OlxApi\AdvertOlxStatusesEnum;
use App\Http\APIClient;
use App\Models\Modules\Invoices\Advert;
use Illuminate\Console\Command;
use Illuminated\Console\WithoutOverlapping;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class UpdateAdvertsOlxStatus extends Command
{
    use WithoutOverlapping;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adverts:update_olx_status {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating adverts OLX status';

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
        $advertId = $this->argument('id');

        if ($advertId === null) {
            $counter = 0;
            $postedAdverts = Advert::query()
                ->where('status', '=', AdvertStatusesEnum::POSTED)
                ->orderBy('last_olx_update_at')
                ->limit(4500)
                ->get();

            $this->info("Adverts to check: " . $postedAdverts->count());

            $out = new ConsoleOutput();

            $bar = new ProgressBar($out, $postedAdverts->count());

            $bar->start();

            foreach ($postedAdverts as $postedAdvert) {

                $this->updateAdvertOlxStatus($postedAdvert);

                $counter++;

                $bar->advance();
            }

            $bar->finish();

            $this->info("");
            $this->info("Updated adverts: " . $counter . " / " . $postedAdverts->count());
        } else {
            $postedAdvert = Advert::find($advertId);

            if ($postedAdvert) {
                $this->info("Advert #" . $advertId . " checking");

                $this->updateAdvertOlxStatus($postedAdvert);

                $this->info("Advert #" . $advertId . " updated");
            } else {
                $this->info("Advert #" . $advertId . " not found");

                return false;
            }
        }

        return true;
    }

    private function updateAdvertOlxStatus($postedAdvert)
    {
        //TODO: Punkt 11 tutaj - https://developer.olx.ua/articles/faq
        if ($postedAdvert->olx_id) {
            $result = APIClient::getAdvert($postedAdvert->olx_id);

            if (!$result->isOk()) {
                if ($result->getStatusCode() === 404) {
                    $newOlxStatus = AdvertOlxStatusesEnum::DELETED_PERMANENTLY;
                }
            } else {
                $data = $result->getData();

                $newOlxStatus = ($data->data->status);
            }

            if ($result->getStatusCode() !== 500) {
                if ($newOlxStatus === AdvertOlxStatusesEnum::ACTIVE || $newOlxStatus === AdvertOlxStatusesEnum::NEW) {
                    $newStatus = AdvertStatusesEnum::POSTED;
                } else {
                    $newStatus = AdvertStatusesEnum::NOT_POSTED;
                }

                $postedAdvert->update([
                    'olx_status' => $newOlxStatus,
                    'status' => $newStatus,
                    'last_olx_update_at' => currentDateTime(),
                ]);
            }
        }
    }
}
