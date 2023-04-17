<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('modules/invoices/modals/delete_single',['item' => $invoice])
            @include('templates.buttons.edit',['route' => route('invoices.edit',$invoice->id), 'disabled' => $invoice->is_active || $invoice->is_in_queue])
            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$invoice->id.')','disabled' => $invoice->is_in_queue])
            @if(!$invoice->is_active)
                @include('modules/invoices/modals/add_to_olx_single',['item' => $invoice])
                @include('templates.buttons.button',['label' => 'Wystaw','color' => 'positive','icon' => 'globe-alt','action' => 'openAddToOlxSingleModal('.$invoice->id.')','disabled' => $invoice->is_in_queue || !code()])
            @else
                <x-button lime label="Zobacz" icon="eye" href="{{$invoice->olx_link}}" target="_blank"/>
            @endif
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Produkcja','value' => $invoice->production])
            @include('templates.show.row',['label' => 'Numer','value' => $invoice->production_number])
            @include('templates.show.row',['label' => 'Nazwa','value' => $invoice->name])
            @include('templates.show.row',['label' => 'Cena','value' => priceShowFormat($invoice->price)])
            @include('templates.show.row',['label' => 'Egzemplarz','value' => $invoice->item_number])
            @include('templates.show.row',['label' => 'Stan','value' => $invoice->condition ?? "-"])
            <br>
            @include('templates.show.row',['label' => 'Status','value' => $invoice->status_text])
            @include('templates.show.row',['label' => 'Status OLX','value' => $invoice->olx_status_text])
            @include('templates.show.row',['label' => 'OLX ID','value' => $invoice->olx_id])
            @include('templates.show.row',['label' => 'Zdjęcia','value' => $invoice->photos_count_text])
        </x-card>
    </div>
    @include('modules.invoices.photos.show')
    <div class="pb-3">
        <x-card title="Kolejka dla ogłoszenia" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @livewire('modules.queue.queue-index',['invoice_id' => $invoice->id])
        </x-card>
    </div>
</div>
