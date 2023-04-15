<?php

namespace App\Console\Commands;

use App\Enum\Modules\Adverts\AdvertOperationsEnum;
use App\Models\Modules\Adverts\QueueOfAdvert;
use App\Services\Modules\AdvertsService;
use Illuminate\Console\Command;
use Illuminated\Console\WithoutOverlapping;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class RunQueue extends Command
{
    use WithoutOverlapping;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts queue of adverts';

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
     * @throws \Exception
     */
    public function handle()
    {
        //TODO: sprawdzić stan ogłoszenia na OLX przed żądaniem API - bo złe jest np. usuwanie usuniętego ogłoszenia
        $counter = 0;
        $queuedAdverts = QueueOfAdvert::query()
            ->whereNull('executed_at')
//            ->orWhere(function ($query) {
//                return $query->whereNotNull('executed_at')
//                    ->where('response_code', '<>', 200);
//            })
            ->limit(50)
            ->get();

        $this->info("Adverts in queue: " . $queuedAdverts->count());

        $out = new ConsoleOutput();

        $bar = new ProgressBar($out, $queuedAdverts->count());

        $bar->start();

        foreach ($queuedAdverts as $queuedAdvert) {
            $result = false;

            if ($queuedAdvert->operation === AdvertOperationsEnum::DELETE) {
                $result = AdvertsService::removeFromOlx($queuedAdvert->advert_id);
            } elseif ($queuedAdvert->operation === AdvertOperationsEnum::ADD_TO_OLX) {
                $category = json_decode($queuedAdvert->params, true)['category'];
                $result = AdvertsService::addToOlx($queuedAdvert->advert_id, $category);
            } elseif ($queuedAdvert->operation === AdvertOperationsEnum::MARK_AS_NOT_POSTED) {
                $result = AdvertsService::markAsNotPosted($queuedAdvert->advert_id);
            }

            if ($result) {
                $queuedAdvert->update([
                    'executed_at' => currentDateTime(),
                    'response_code' => $result['code'],
                    'response_message' => $result['message'],
                ]);
                $counter++;
            }

            $bar->advance();
        }

        $bar->finish();

        $this->info("");
        $this->info("Done: " . $counter . " / " . $queuedAdverts->count());


        return true;
    }
}
