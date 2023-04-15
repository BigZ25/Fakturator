<div>
{{--    TODO: poprawić bo jak kliknę usuń to formularz się zeruje--}}
{{--    @if($advert->id)--}}
{{--        <div class="pb-3">--}}
{{--            <x-card padding="p-2" color="bg-white" rounded="rounded-sm">--}}
{{--                @include('modules/adverts/modals/delete_single',['item' => $advert])--}}
{{--                @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$advert->id.')','disabled' => ???])--}}
{{--            </x-card>--}}
{{--        </div>--}}
{{--    @endif--}}

    <form method="POST" action="{{$advert->id ? route('adverts.update',$advert->id) : route('adverts.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($advert->id)
            @method('PUT')
        @endif
        @csrf
        @include('templates.form.hidden',['name' => 'import', 'value' => $import, 'type' => 'number'])
        @if($import === 0)
            <div class="pb-3">
                <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 50,'value' => $advert->production,'name' => 'production', 'label' => 'Produkcja'])
                        @include('templates.form.text',['width' => 30,'value' => $advert->production_number,'name' => 'production_number', 'label' => 'Numer'])
                        @include('templates.form.text',['width' => 20,'value' => $advert->condition,'name' => 'condition', 'label' => 'Stan'])
                    </div>
                    <div class="flex flex-wrap">
                        @include('templates.form.text',['width' => 50,'value' => $advert->name,'name' => 'name' ,'label' => 'Nazwa'])
                        @include('templates.form.text',['width' => 30,'value' => $advert->price ,'name' => 'price','label' => 'Cena'])
                        @include('templates.form.text',['width' => 30,'value' => $advert->item_number,'name' => 'item_number','label' => 'Egzemplarz'])
                    </div>
                </x-card>
            </div>
            @include('modules.adverts.photos.form')
        @else
            <div class="pb-3">
                <x-card title="Prześlij plik(i)" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                    @livewire('templates.files',['allowed_extensions' => ['.xls', '.xlsx', '.csv']])
                </x-card>
            </div>
        @endif

        @if($entity_id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
