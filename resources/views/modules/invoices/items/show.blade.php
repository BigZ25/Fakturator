<div>
    @include('modules/collections/items/modals/delete_single',['item' => $collectionItem])
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.edit',['route' => route('collections.items.edit',[$collectionItem->collection_id, $collectionItem->id])])
            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$collectionItem->id.')'])
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Nazwa','value' => $collectionItem->name])
            @include('templates.show.row',['label' => 'Opis','value' => $collectionItem->description])
            @include('templates.show.row',['label' => 'Kwota zakupu','value' => formatPriceShow($collectionItem->buy_price)])
            @include('templates.show.row',['label' => 'Data zakupu','value' => $collectionItem->buy_date])
            @include('templates.show.row',['label' => 'Kwota sprzedaży','value' => formatPriceShow($collectionItem->sell_price)])
            @include('templates.show.row',['label' => 'Data sprzedaży','value' => $collectionItem->sell_date])
            @include('templates.show.row',['label' => 'Wartość rynkowa','value' => formatPriceShow($collectionItem->market_price) . " na dzień " . $collectionItem->market_price_updated_at])
            @include('templates.show.row',['label' => 'Nazwa','value' => $collectionItem->name])
            @include('templates.show.row',['label' => 'Nazwa','value' => $collectionItem->name])
        </x-card>
    </div>
    @include('modules.collections.items.photos.show')
</div>
