<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            {{--            @include('modules/collections/modals/delete_single',['item' => $collection])--}}
            {{--            @include('templates.buttons.edit',['route' => route('collections.edit',$collection->id), 'disabled' => $collection->is_active || $collection->is_in_queue])--}}
            {{--            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$collection->id.')','disabled' => $collection->is_in_queue])--}}
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Nazwa','value' => $collection->name])
            {{--            @include('templates.show.row',['label' => 'Opis','value' => $collection->description])--}}
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Przedmioty w kolekcji" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @livewire('modules.collections.items.collection-items-index',['collection' => $collection])
        </x-card>
    </div>
</div>
