<div>
    @if($entity)
        <x-modal.card title="Usuwanie ogłoszenia" blur wire:model.defer="deleteModal">
            <form method="POST" action="{{$entity->deletion->route}}" id="deleteForm" class="ajax-form">
                @method('DELETE')
                <div>
                    <h1 class="text-2xl">{{$entity->deletion->content}}</h1>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-end">
                        <x-button red label="Tak" class="mr-2" type="submit" form="deleteForm"/>
                        <x-button flat label="Nie" class="mr-2" x-on:click="close"/>
                    </div>
                </x-slot>
            </form>
        </x-modal.card>
    @endif
</div>
