<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            {{--            @include('modules/products/modals/delete_single',['item' => $product])--}}
            {{--            @include('templates.buttons.edit',['route' => route('products.edit',$product->id), 'disabled' => $product->is_active || $product->is_in_queue])--}}
            {{--            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$product->id.')','disabled' => $product->is_in_queue])--}}
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Nazwa','value' => $product->name])
            {{--            @include('templates.show.row',['label' => 'Opis','value' => $product->description])--}}
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Przedmioty w kolekcji" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @livewire('modules.products.items.product-items-index',['product' => $product])
        </x-card>
    </div>
</div>
