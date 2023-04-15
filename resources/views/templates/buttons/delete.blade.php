@if(!isset($button) || (isset($button) && $button === true))
    <x-button red label="Usuń" icon="trash" onclick="$openModal('deleteModal')"/>
@endif

<x-modal.card title="{{$item?->deletion->title}}" blur wire:model.defer="deleteModal">
    <form method="POST" action="{{$item?->deletion->url}}" id="deleteForm">
        @method('DELETE')
        @csrf
        <div>
            <h1 class="text-2xl">{{$item?->deletion->content}}</h1>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button red label="Tak" class="mr-2" type="submit" form="deleteForm"/>
                <x-button flat label="Nie" class="mr-2" x-on:click="close"/>
            </div>
        </x-slot>
    </form>
</x-modal.card>
