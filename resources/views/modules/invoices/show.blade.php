<div>
    @livewire('templates.delete')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.edit',['route' => route('invoices.edit',$invoice->id), 'disabled' => $invoice->is_active || $invoice->is_in_queue])
            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($invoice),'\\').'",'.$invoice->id.')','disabled' => $invoice->is_in_queue])
        </x-card>
    </div>
    <div class="pb-3">
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
    @livewire('modules.invoices.items.invoice-items-show',['parentId' => $invoice->id])
</div>
