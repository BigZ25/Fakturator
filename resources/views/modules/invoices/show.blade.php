<div>
    @livewire('templates.delete')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.edit',['route' => route('invoices.edit',$invoice->id), 'disabled' => $invoice->is_active || $invoice->is_in_queue])
            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($invoice),'\\').'",'.$invoice->id.')'])
            @include('templates.buttons.button',['label' => 'Pobierz PDF','color' => 'indigo','icon' => 'document-download','route' => route('invoices.pdf',$invoice->id),'blank' => true])
            @include('templates.buttons.button',['label' => 'Wystaw podobną','color' => 'cyan','icon' => 'document-duplicate','route' => route('invoices.copy',$invoice->id)])
            @if(!$invoice->have_correction)
                @include('templates.buttons.button',['label' => 'Wystaw korektę','color' => 'stone','icon' => 'document-add','route' => route('invoices.correction',$invoice->id)])
            @else
                @include('templates.buttons.button',['label' => 'Zobacz korektę','color' => 'sky','icon' => 'document','route' => route('invoices.show',$invoice->correction_invoice_id)])
            @endif
        </x-card>
    </div>
    <div class="flex pb-3">
        <div class="flex-1 pr-2">
            <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
                @include('templates.show.row',['label' => 'Numer','value' => $invoice->number])
                @include('templates.show.row',['label' => 'Adres e-mail do wysyłki','value' => $invoice->send_email])
                @include('templates.show.row',['label' => 'Data sprzedaży','value' => $invoice->sale_date])
                @include('templates.show.row',['label' => 'Data wystawienia','value' => $invoice->issue_date])
                @include('templates.show.row',['label' => 'Termin płatności','value' => $invoice->payment_date])
                @include('templates.show.row',['label' => 'Zapłacono dnia','value' => $invoice->paid_date])
                @include('templates.show.row',['label' => 'Metoda płatności','value' => $invoice->payment_method_name])
                @include('templates.show.row',['label' => 'Faktura wydrukowana','value' => $invoice->is_printed_text])
                @include('templates.show.row',['label' => 'Faktura wysłana','value' => $invoice->is_send_text])
                @include('templates.show.textarea',['label' => 'Notatki','value' => $invoice->notes])
                @include('templates.show.timestamp',['entity' => $invoice])
            </x-card>
        </div>
        <div x-data="tabs">
            <div class="grid grid-cols-3 cursor-pointer">
                <div :class="getClasses(1)" @click="setActive(1)">
                    <h3 class="text-md font-medium text-secondary-700 dark:text-secondary-400 whitespace-normal">Dane nabywcy</h3>
                </div>
                <div :class="getClasses(2)" @click="setActive(2)">
                    <h3 class="text-md font-medium text-secondary-700 dark:text-secondary-400 whitespace-normal">Dane odbiorcy</h3>
                </div>
            </div>
            <div>
                <div x-show="isActive(1)" x-transition:enter.duration.500ms>
                    <x-card color="bg-white flex" rounded="rounded-sm" cardClasses="card-body" style>
                        @include('templates.company_data.show',['entity' => $invoice, 'prefix' => 'buyer'])
                        <div class="flex flex-wrap">
                            @include('templates.show.row',['label' => 'Adres e-mail','value' => $invoice->send_email])
                        </div>
                    </x-card>
                </div>
                <div x-show="isActive(2)" x-transition:enter.duration.500ms>
                    <x-card color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                        @include('templates.company_data.show',['entity' => $invoice, 'prefix' => 'recipient'])
                    </x-card>
                </div>
            </div>
        </div>
    </div>
    @if($invoice->is_correction)
        @livewire('modules.invoices.items.invoice-items-show',['parentId' => $invoice->correctionParent->id,'box_title' => 'Pozycje na fakturze przed korektą'])
    @endif
    @livewire('modules.invoices.items.invoice-items-show',['parentId' => $invoice->id,'box_title' => $invoice->correctionParent ? 'Pozycje na fakturze po korekcie' : 'Pozycje na fakturze'])
</div>
