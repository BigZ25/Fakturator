<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('modules/adverts/modals/delete_single',['item' => $advert])
            @include('templates.buttons.edit',['route' => route('adverts.edit',$advert->id), 'disabled' => $advert->is_active || $advert->is_in_queue])
            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$advert->id.')','disabled' => $advert->is_in_queue])
            @if(!$advert->is_active)
                @include('modules/adverts/modals/add_to_olx_single',['item' => $advert])
                @include('templates.buttons.button',['label' => 'Wystaw','color' => 'positive','icon' => 'globe-alt','action' => 'openAddToOlxSingleModal('.$advert->id.')','disabled' => $advert->is_in_queue || !code()])
            @else
                <x-button lime label="Zobacz" icon="eye" href="{{$advert->olx_link}}" target="_blank"/>
            @endif
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Produkcja','value' => $advert->production])
            @include('templates.show.row',['label' => 'Numer','value' => $advert->production_number])
            @include('templates.show.row',['label' => 'Nazwa','value' => $advert->name])
            @include('templates.show.row',['label' => 'Cena','value' => priceShowFormat($advert->price)])
            @include('templates.show.row',['label' => 'Egzemplarz','value' => $advert->item_number])
            @include('templates.show.row',['label' => 'Stan','value' => $advert->condition ?? "-"])
            <br>
            @include('templates.show.row',['label' => 'Status','value' => $advert->status_text])
            @include('templates.show.row',['label' => 'Status OLX','value' => $advert->olx_status_text])
            @include('templates.show.row',['label' => 'OLX ID','value' => $advert->olx_id])
            @include('templates.show.row',['label' => 'Zdjęcia','value' => $advert->photos_count_text])
        </x-card>
    </div>
    @include('modules.adverts.photos.show')
    <div class="pb-3">
        <x-card title="Kolejka dla ogłoszenia" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @livewire('modules.queue.queue-index',['advert_id' => $advert->id])
        </x-card>
    </div>
</div>
