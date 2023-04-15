<div>
    <form method="POST" action="{{$collectionItem->id ? route('collections.items.update',[$collection_id, $collectionItem->id]) : route('collections.items.store', $collection_id)}}" enctype="multipart/form-data" class="ajax-form">
        @if($collectionItem->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 50,'value' => $collectionItem->name,'name' => 'name' ,'label' => 'Nazwa'])
                    @include('templates.form.text',['width' => 25,'value' => $collectionItem->buy_price,'name' => 'buy_price' ,'label' => 'Cena zakupu'])
                    @include('templates.form.date',['width' => 25,'value' => $collectionItem->buy_date ,'name' => 'buy_date','label' => 'Data zakupu'])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.textarea',['rows' => 5,'width' => 100,'value' => $collectionItem->description ,'name' => 'description','label' => 'Opis'])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 40,'value' => $collectionItem->market_price,'name' => 'market_price' ,'label' => 'Cena rynkowa'])
                    @include('templates.form.text',['width' => 30,'value' => $collectionItem->sell_price,'name' => 'sell_price' ,'label' => 'Cena sprzedaży'])
                    @include('templates.form.date',['width' => 30,'value' => $collectionItem->sell_date ,'name' => 'sell_date','label' => 'Data sprzedaży'])
                </div>
            </x-card>
        </div>
        @include('modules.collections.items.photos.form')
        @if($entity_id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
