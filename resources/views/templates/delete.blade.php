<div>
    @if($entity)
        <x-modal.card title="{{$entity->deletion->title}}" blur wire:model.defer="deleteModal">
            <form method="POST" action="{{$entity->deletion->route}}" id="deleteForm" class="ajax-form">
                @csrf
                @method('DELETE')
                @if(isset($entity->deletion->ids))
                    @foreach($entity->deletion->ids as $id)
                        @include('templates.form.hidden',['name' => 'ids[]', 'value' => $id])
                    @endforeach
                @endif
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
