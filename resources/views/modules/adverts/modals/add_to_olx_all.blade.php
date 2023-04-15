<x-modal.card title="Wystawianie wszystkich elementów" blur wire:model.defer="addToOlxAllModal">
    <form method="POST" action="{{route('adverts.add_to_olx')}}" id="addToOlxAllForm" class="ajax-form">
        @csrf
        @include('templates.form.hidden',['name' => 'operation', 'value' => \App\Enum\Modules\Adverts\AdvertOperationsEnum::ADD_TO_OLX])
        @include('templates.form.hidden',['name' => 'mode', 'value' => 0])
        <div class="flex flex-wrap">
            @include('templates.form.select',['label' => 'Kategoria','options' => \App\Enum\Modules\Adverts\AdvertCategoriesEnum::getSelectList(),'name' => 'category','width' => 100])
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button positive label="Wystaw" class="mr-2" type="submit" form="addToOlxAllForm"/>
                <x-button flat label="Anuluj" class="mr-2" x-on:click="close"/>
            </div>
        </x-slot>
    </form>
</x-modal.card>
