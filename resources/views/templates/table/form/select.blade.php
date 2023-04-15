<td class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    @if(isset($model))
        <x-select placeholder="{{$placeholder ?? 'Wybierz'}}" :options="$options" option-label="text" option-value="id" wire:model="{{$model}}"/>
    @elseif(isset($name))
        <x-my-select placeholder="{{$placeholder ?? 'Wybierz'}}" :options="$options" option-label="text" option-value="id" name="{{$name}}" value="{{$value}}"/>
    @endif
</td>
