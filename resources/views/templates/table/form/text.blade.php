<td class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-input name="{{$name ?? ''}}" value="{{$value ?? ''}}" wire:model="{{$model ?? ''}}" :disabled="$disabled ?? false"/>
</td>
