<x-modal.card title="Usuwanie ogłoszenia" blur wire:model.defer="deleteSingleModal">
    <form method="POST" action="{{$item?->deletion->url}}" id="deleteSingleForm" class="ajax-form">
        @method('DELETE')
        @csrf
        @include('templates.form.hidden',['name' => 'operation', 'value' => \App\Enum\Modules\Adverts\AdvertOperationsEnum::DELETE])
        @include('templates.form.hidden',['name' => 'mode', 'value' => 2])
        @include('templates.form.hidden',['name' => 'ids[]', 'value' => $item?->id])
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
</x-modal.card>
