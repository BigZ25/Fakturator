<x-modal.card title="Usuwanie ogłoszenia" blur wire:model.defer="deleteSingleModal">
    @if($item)
        <form method="POST" action="{{route('collections.items.destroy',[$item?->collection_id, $item?->id])}}" id="deleteSingleForm" class="ajax-form">
            @csrf
            @method('DELETE')
            <div>
                <h1 class="text-2xl">{{$item?->deletion->content}}</h1>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-button red label="Tak" class="mr-2" type="submit" form="deleteSingleForm"/>
                    <x-button flat label="Nie" class="mr-2" x-on:click="close"/>
                </div>
            </x-slot>
        </form>
    @endif
</x-modal.card>
