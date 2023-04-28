<div>
    @livewire('templates.delete')
    @include('modules.products.search')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj produkt', 'route' => route('products.create')])
        </x-card>
    </div>
    <x-card title="Produkty" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($products) > 0)
            <div class="mb-2">
                {!! $products->links() !!}
            </div>

            <table class="w-full table-auto text-left border">
                <thead>
                <tr>
                    @include('templates.table.show.th',['label' => "L.p."])
                    @include('templates.table.show.th',['label' => "Nazwa",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Wartość rynkowa",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Szczegóły"])
                    @include('templates.table.show.th',['label' => "Edycja"])
                    @include('templates.table.show.th',['label' => "Usuń"])
                </tr>
                </thead>
                <tbody class="border">
                @foreach($products as $product)
                    <tr>
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $product->name]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => priceShowFormat($product->total_market_price)]]])
                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('products.show',$product->id)])
                        @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('products.edit',$product->id), 'disabled' => $product->is_active || $product->is_in_queue])
                        @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($product),'\\').'",'.$product->id.')','disabled' => $product->is_in_queue])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $products->links() !!}
            </div>
        @else
            <p>Brak produktów</p>
        @endif
    </x-card>
</div>
