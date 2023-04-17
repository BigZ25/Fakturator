<?php

namespace App\Console\Commands;

use App\Enum\Modules\Invoices\InvoiceStatusesEnum;
use App\Enum\OlxApi\InvoiceOlxStatusesEnum;
use App\Http\APIClient;
use App\Models\Modules\Invoices\Invoice;
use Illuminate\Console\Command;
use Illuminated\Console\WithoutOverlapping;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class UpdateInvoicesOlxStatus extends Command
{
    use WithoutOverlapping;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoices:update_olx_status {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating invoices OLX status';

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
        $invoiceId = $this->argument('id');

        if ($invoiceId === null) {
            $counter = 0;
            $postedInvoices = Invoice::query()
                ->where('status', '=', InvoiceStatusesEnum::POSTED)
                ->orderBy('last_olx_update_at')
                ->limit(4500)
                ->get();

            $this->info("Invoices to check: " . $postedInvoices->count());

            $out = new ConsoleOutput();

            $bar = new ProgressBar($out, $postedInvoices->count());

            $bar->start();

            foreach ($postedInvoices as $postedInvoice) {

                $this->updateInvoiceOlxStatus($postedInvoice);

                $counter++;

                $bar->advance();
            }

            $bar->finish();

            $this->info("");
            $this->info("Updated invoices: " . $counter . " / " . $postedInvoices->count());
        } else {
            $postedInvoice = Invoice::find($invoiceId);

            if ($postedInvoice) {
                $this->info("Invoice #" . $invoiceId . " checking");

                $this->updateInvoiceOlxStatus($postedInvoice);

                $this->info("Invoice #" . $invoiceId . " updated");
            } else {
                $this->info("Invoice #" . $invoiceId . " not found");

                return false;
            }
        }

        return true;
    }

    private function updateInvoiceOlxStatus($postedInvoice)
    {
        //TODO: Punkt 11 tutaj - https://developer.olx.ua/articles/faq
        if ($postedInvoice->olx_id) {
            $result = APIClient::getInvoice($postedInvoice->olx_id);

            if (!$result->isOk()) {
                if ($result->getStatusCode() === 404) {
                    $newOlxStatus = InvoiceOlxStatusesEnum::DELETED_PERMANENTLY;
                }
            } else {
                $data = $result->getData();

                $newOlxStatus = ($data->data->status);
            }

            if ($result->getStatusCode() !== 500) {
                if ($newOlxStatus === InvoiceOlxStatusesEnum::ACTIVE || $newOlxStatus === InvoiceOlxStatusesEnum::NEW) {
                    $newStatus = InvoiceStatusesEnum::POSTED;
                } else {
                    $newStatus = InvoiceStatusesEnum::NOT_POSTED;
                }

                $postedInvoice->update([
                    'olx_status' => $newOlxStatus,
                    'status' => $newStatus,
                    'last_olx_update_at' => currentDateTime(),
                ]);
            }
        }
    }
}
