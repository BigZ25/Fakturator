<x-modal.card title="Zdejmowanie wszystkich ogłoszeń" blur wire:model.defer="markAsNotPostedAllModal">
    <form method="POST" action="{{route('adverts.mark')}}" id="markAsNotPostedAllForm" class="ajax-form">
        @csrf
        @include('templates.form.hidden',['name' => 'operation', 'value' => \App\Enum\Modules\Adverts\AdvertOperationsEnum::MARK_AS_NOT_POSTED])
        @include('templates.form.hidden',['name' => 'mode', 'value' => 0])
        <div class="flex flex-wrap">
            @include('templates.form.text',['label' => 'Jeśli jesteś pewien wpisz TAK','name' => 'confirmation','width' => 100])
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button positive label="Prześlij" class="mr-2" type="submit" form="markAsNotPostedAllForm"/>
                <x-button flat label="Anuluj" class="mr-2" x-on:click="close"/>
            </div>
        </x-slot>
    </form>
</x-modal.card>
