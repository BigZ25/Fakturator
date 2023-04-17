<?php

namespace App\Console\Commands;

use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use App\Models\Modules\Invoices\QueueOfInvoice;
use App\Services\Modules\InvoicesService;
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
    protected $description = 'Starts queue of invoices';

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
        $queuedInvoices = QueueOfInvoice::query()
            ->whereNull('executed_at')
//            ->orWhere(function ($query) {
//                return $query->whereNotNull('executed_at')
//                    ->where('response_code', '<>', 200);
//            })
            ->limit(50)
            ->get();

        $this->info("Invoices in queue: " . $queuedInvoices->count());

        $out = new ConsoleOutput();

        $bar = new ProgressBar($out, $queuedInvoices->count());

        $bar->start();

        foreach ($queuedInvoices as $queuedInvoice) {
            $result = false;

            if ($queuedInvoice->operation === InvoiceOperationsEnum::DELETE) {
                $result = InvoicesService::removeFromOlx($queuedInvoice->invoice_id);
            } elseif ($queuedInvoice->operation === InvoiceOperationsEnum::ADD_TO_OLX) {
                $category = json_decode($queuedInvoice->params, true)['category'];
                $result = InvoicesService::addToOlx($queuedInvoice->invoice_id, $category);
            } elseif ($queuedInvoice->operation === InvoiceOperationsEnum::MARK_AS_NOT_POSTED) {
                $result = InvoicesService::markAsNotPosted($queuedInvoice->invoice_id);
            }

            if ($result) {
                $queuedInvoice->update([
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
        $this->info("Done: " . $counter . " / " . $queuedInvoices->count());


        return true;
    }
}
