<x-modal.card title="Usuwanie wszystkich elementów" blur wire:model.defer="deleteAllModal">
    <form method="POST" action="{{route('adverts.delete')}}" id="deleteAllForm" class="ajax-form">
        @csrf
        @include('templates.form.hidden',['name' => 'operation', 'value' => \App\Enum\Modules\Adverts\AdvertOperationsEnum::DELETE])
        @include('templates.form.hidden',['name' => 'mode', 'value' => 0])
        <div>
            <h1 class="text-2xl">Czy napewno chcesz usunąć wszystkie elementy?</h1>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button red label="Tak" class="mr-2" type="submit" form="deleteAllForm"/>
                <x-button flat label="Nie" class="mr-2" x-on:click="close"/>
            </div>
        </x-slot>
    </form>
</x-modal.card>
