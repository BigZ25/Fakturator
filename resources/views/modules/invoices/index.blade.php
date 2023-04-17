<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj fakturę', 'route' => route('invoices.create')])
        </x-card>
    </div>

    @include('modules/invoices/modals/delete_all')
    @include('modules/invoices/modals/delete_selected')
    @include('modules/invoices/modals/delete_single')

    @include('modules.invoices.search')

    <x-card title="Ogłoszenia" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($invoices) > 0)
            <div class="pb-3">
                <x-card padding="p-2" color="bg-gray-100" rounded="rounded-sm">
                    <x-button red label="Usuń wszystko" icon="trash" onclick="$openModal('deleteAllModal')"/>
                    <x-button positive label="Wystaw wszystko" icon="globe-alt" onclick="$openModal('addToOlxAllModal')"/>
                    <x-button lime label="Oznacz wszystko jak nie wystawione" icon="x" onclick="$openModal('markAsNotPostedAllModal')"/>
                </x-card>
            </div>
            <div class="pb-3">
                <x-card padding="p-2" color="bg-gray-100" rounded="rounded-sm">
                    <x-button info label="Zaznacz wszystkie" icon="check-circle" wire:click="selectAllCheckboxes()"/>
                    <x-button amber label="Odznacz wszystkie" icon="x-circle" wire:click="deselectAllCheckboxes()"/>
                    <x-button red label="Usuń zaznaczone" icon="trash" onclick="$openModal('deleteSelectedModal')"/>
                </x-card>
            </div>

            <div class="mb-2">
                {!! $invoices->links() !!}
            </div>

            <table class="w-full table-auto text-left border">
                <thead>
                <tr>
                    @include('templates.table.show.th',['label' => "Zaz."])
                    @include('templates.table.show.th',['label' => "L.p."])
                    @include('templates.table.show.th',['label' => "Nazwa",'align' => 'left','sort_col_id' => 'full_name_with_item_number'])
                    @include('templates.table.show.th',['label' => "Cena, stan",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Status, zdjęcia, stan",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Akcja"])
                    @include('templates.table.show.th',['label' => "Szczegóły"])
                    @include('templates.table.show.th',['label' => "Edycja"])
                    @include('templates.table.show.th',['label' => "Kopiuj"])
                    @include('templates.table.show.th',['label' => "Usuń"])
                </tr>
                </thead>
                <tbody class="border">
                @foreach($invoices as $invoice)
                    <tr>
                        @include('templates.table.form.checkbox',['id' => $loop->index,'value' => ($checkboxes[$loop->index]['value'] ?? 0) === 0 ? 1 : 0])
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['route' => route('invoices.show',$invoice->id),'text' => $invoice->full_name_with_item_number]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['label' => 'Cena','text' => priceShowFormat($invoice->price)],['label' => 'Stan','text' => $invoice->condition ?? "-"]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['label' => 'Status','text' => $invoice->status_text],['label' => 'Zdjęcia','text' => $invoice->photos_count_text]]])
                        @if($invoice->is_active)
                            @include('templates.table.show.button',['label' => 'Zobacz','color' => 'lime','icon' => 'eye','route' => $invoice->olx_link,'blank' => true])
                        @else
                            @include('templates.table.show.button',['label' => 'Wystaw','color' => 'positive','icon' => 'globe-alt','action' => 'openAddToOlxSingleModal('.$invoice->id.')','disabled' => $invoice->is_in_queue])
                        @endif
                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('invoices.show',$invoice->id)])
                        @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('invoices.edit',$invoice->id), 'disabled' => $invoice->is_active || $invoice->is_in_queue])
                        @include('templates.table.show.button',['label' => 'Kopiuj','color' => 'fuchsia','icon' => 'clipboard-copy','route' => route('invoices.create') . "?copy=" . $invoice->id, 'disabled' => $invoice->is_in_queue])
                        @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$invoice->id.')','disabled' => $invoice->is_in_queue])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $invoices->links() !!}
            </div>
        @else
            <p>Brak faktur</p>
        @endif
    </x-card>
</div>
