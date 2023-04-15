<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj ogłoszenia z pliku', 'route' => route('adverts.create') . "?import"])
            @include('templates.buttons.new',['label' => 'Dodaj ogłoszenia przez formularz', 'route' => route('adverts.create')])
        </x-card>
    </div>

    @include('modules/adverts/modals/mark_as_not_posted_all')

    @include('modules/adverts/modals/add_to_olx_all')
    @include('modules/adverts/modals/add_to_olx_selected')
    @include('modules/adverts/modals/add_to_olx_single')

    @include('modules/adverts/modals/delete_all')
    @include('modules/adverts/modals/delete_selected')
    @include('modules/adverts/modals/delete_single')

    @include('modules.adverts.search')

    <x-card title="Ogłoszenia" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($adverts) > 0)
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
                    <x-button positive label="Wystaw zaznaczone" icon="globe-alt" onclick="$openModal('addToOlxSelectedModal')"/>
                </x-card>
            </div>

            <div class="mb-2">
                {!! $adverts->links() !!}
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
                @foreach($adverts as $advert)
                    <tr>
                        @include('templates.table.form.checkbox',['id' => $loop->index,'value' => ($checkboxes[$loop->index]['value'] ?? 0) === 0 ? 1 : 0])
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['route' => route('adverts.show',$advert->id),'text' => $advert->full_name_with_item_number]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['label' => 'Cena','text' => priceShowFormat($advert->price)],['label' => 'Stan','text' => $advert->condition ?? "-"]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['label' => 'Status','text' => $advert->status_text],['label' => 'Zdjęcia','text' => $advert->photos_count_text]]])
                        @if($advert->is_active)
                            @include('templates.table.show.button',['label' => 'Zobacz','color' => 'lime','icon' => 'eye','route' => $advert->olx_link,'blank' => true])
                        @else
                            @include('templates.table.show.button',['label' => 'Wystaw','color' => 'positive','icon' => 'globe-alt','action' => 'openAddToOlxSingleModal('.$advert->id.')','disabled' => $advert->is_in_queue])
                        @endif
                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('adverts.show',$advert->id)])
                        @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('adverts.edit',$advert->id), 'disabled' => $advert->is_active || $advert->is_in_queue])
                        @include('templates.table.show.button',['label' => 'Kopiuj','color' => 'fuchsia','icon' => 'clipboard-copy','route' => route('adverts.create') . "?copy=" . $advert->id, 'disabled' => $advert->is_in_queue])
                        @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$advert->id.')','disabled' => $advert->is_in_queue])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $adverts->links() !!}
            </div>
        @else
            <p>Brak ogłoszeń</p>
        @endif
    </x-card>
</div>
