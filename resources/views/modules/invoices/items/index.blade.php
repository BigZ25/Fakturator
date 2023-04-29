<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj przedmiot', 'route' => route('collections.items.create',$collection->id)])
        </x-card>
    </div>
    @include('modules/collections/items/modals/delete_single')
    @include('modules.collections.items.search')
    <x-card title="Przedmioty w kolekcji" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($collectionItems) > 0)
            <div class="mb-2">
                {!! $collectionItems->links() !!}
            </div>
            <table class="w-full table-auto text-left border">
                <thead>
                <tr>
                    @include('templates.table.show.th',['label' => "L.p."])
                    @include('templates.table.show.th',['label' => "Nazwa",'align' => 'left','sort_col_id' => 'full_name_with_item_number'])
                    @include('templates.table.show.th',['label' => "Szczegóły"])
                    @include('templates.table.show.th',['label' => "Edycja"])
                    @include('templates.table.show.th',['label' => "Usuń"])
                </tr>
                </thead>
                <tbody class="border">
                @foreach($collectionItems as $collectionItem)
                    <tr>
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $collectionItem->name]]])
                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('collections.items.show',[$collectionItem->collection_id, $collectionItem->id])])
                        @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('collections.items.edit',[$collectionItem->collection_id,$collectionItem->id]), 'disabled' => $collectionItem->is_active || $collectionItem->is_in_queue])
                        @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$collectionItem->id.')','disabled' => $collectionItem->is_in_queue])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $collectionItems->links() !!}
            </div>
        @else
            <p class="text-center">Brak pozycji</p>
        @endif
    </x-card>
</div>
