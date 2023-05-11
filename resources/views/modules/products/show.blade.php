<div>
    @livewire('templates.delete')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.edit',['route' => route('products.edit',$product->id), 'disabled' => $product->is_active || $product->is_in_queue])
            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($product),'\\').'",'.$product->id.')','disabled' => $product->is_in_queue])
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Nazwa','value' => $product->name])
            @include('templates.show.row',['label' => 'VAT','value' => $product->vat_type_name])
            @include('templates.show.row',['label' => 'Cena','value' => formatPriceShow($product->price)])
            @include('templates.show.row',['label' => 'Ilość','value' => $product->quantity])
            @include('templates.show.timestamp',['entity' => $product])
        </x-card>
    </div>
</div>
