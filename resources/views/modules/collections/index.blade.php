<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj kolekcje', 'route' => route('collections.create')])
        </x-card>
    </div>
    @include('modules/collections/modals/delete_single')
    @include('modules.collections.search')
    <x-card title="Kolekcje" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($collections) > 0)
            <div class="mb-2">
                {!! $collections->links() !!}
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
                @foreach($collections as $collection)
                    <tr>
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $collection->name]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => priceShowFormat($collection->total_market_price)]]])
                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('collections.show',$collection->id)])
                        @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('collections.edit',$collection->id), 'disabled' => $collection->is_active || $collection->is_in_queue])
                        @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$collection->id.')','disabled' => $collection->is_in_queue])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $collections->links() !!}
            </div>
        @else
            <p>Brak kolekcji</p>
        @endif
    </x-card>
</div>
