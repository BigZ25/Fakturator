<div class="pb-3">
    <x-card title="Ogłoszenia" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($adverts) > 0)
            {{--            <div class="pb-3">--}}
            {{--                <x-card padding="p-2" color="bg-gray-100" rounded="rounded-sm">--}}
            {{--                    <x-button red label="Usuń wszystko" icon="trash" onclick="$openModal('deleteAllModal')"/>--}}
            {{--                    <x-button positive label="Wystaw wszystko" icon="globe-alt" onclick="$openModal('addToOlxAllModal')"/>--}}
            {{--                </x-card>--}}
            {{--            </div>--}}
            {{--            <div class="pb-3">--}}
            {{--                <x-card padding="p-2" color="bg-gray-100" rounded="rounded-sm">--}}
            {{--                    <x-button info label="Zaznacz wszystkie" icon="check-circle" wire:click="selectAllCheckboxes()"/>--}}
            {{--                    <x-button amber label="Odznacz wszystkie" icon="x-circle" wire:click="deselectAllCheckboxes()"/>--}}
            {{--                    <x-button red label="Usuń zaznaczone" icon="trash" onclick="$openModal('deleteSelectedModal')"/>--}}
            {{--                    <x-button positive label="Wystaw zaznaczone" icon="globe-alt" onclick="$openModal('addToOlxSelectedModal')"/>--}}
            {{--                </x-card>--}}
            {{--            </div>--}}

            <div class="mb-2">
                {!! $adverts->links() !!}
            </div>

            <table class="w-full table-auto text-left border">
                <thead>
                <tr>
                    {{--                    @include('templates.table.show.th',['label' => "Zaz."])--}}
                    @include('templates.table.show.th',['label' => "L.p."])
                    @include('templates.table.show.th',['label' => "Zdjęcie"])
                    @include('templates.table.show.th',['label' => "Cena"])
                    @include('templates.table.show.th',['label' => "Nazwa",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Zobacz"])
                    {{--                    @include('templates.table.show.th',['label' => "Akcja"])--}}
                    {{--                    @include('templates.table.show.th',['label' => "Edycja"])--}}
                    {{--                    @include('templates.table.show.th',['label' => "Kopiuj"])--}}
                    {{--                    @include('templates.table.show.th',['label' => "Usuń"])--}}
                </tr>
                </thead>
                <tbody class="border">
                @foreach($adverts as $advert)
                    <tr @if(!$advert->was_viewed) class="bg-primary-500" @endif>
                        {{--                        @include('templates.table.form.checkbox',['id' => $loop->index,'value' => ($checkboxes[$loop->index]['value'] ?? 0) === 0 ? 1 : 0])--}}
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.image',['url' => $advert->photo_link])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => formatPriceShow($advert->price)]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['route' => $advert->link,'text' => $advert->name,'blank' => true]]])
                        @include('templates.table.show.button',['label' => 'Zobacz','color' => 'lime','icon' => 'eye','route' => $advert->link,'blank' => true])

                        {{--                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('observations.show',$advert->id)])--}}
                        {{--                        @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('observations.edit',$advert->id), 'disabled' => $advert->is_active || $advert->is_in_queue])--}}
                        {{--                        @include('templates.table.show.button',['label' => 'Kopiuj','color' => 'fuchsia','icon' => 'clipboard-copy','route' => route('observations.create') . "?copy=" . $advert->id, 'disabled' => $advert->is_in_queue])--}}
                        {{--                        @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$advert->id.')','disabled' => $advert->is_in_queue])--}}
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
