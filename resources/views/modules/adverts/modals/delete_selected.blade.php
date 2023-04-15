<x-modal.card title="Usuwanie zaznaczonych elementów" blur wire:model.defer="deleteSelectedModal">
    <form method="POST" action="{{route('adverts.delete')}}" id="deleteSelectedForm" class="ajax-form">
        @csrf
        @include('templates.form.hidden',['name' => 'operation', 'value' => \App\Enum\Modules\Adverts\AdvertOperationsEnum::DELETE])
        @include('templates.form.hidden',['name' => 'mode', 'value' => 1])
        @include('templates.form.hidden',['name' => 'ids[]', 'values' => selectedCheckboxesIds($this->checkboxes),'multiple' => true])
        <div>
            <h1 class="text-2xl">Czy napewno chcesz usunąć zaznaczone elementy?</h1>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button red label="Tak" class="mr-2" type="submit" form="deleteSelectedForm"/>
                <x-button flat label="Nie" class="mr-2" x-on:click="close"/>
            </div>
        </x-slot>
    </form>
</x-modal.card>
