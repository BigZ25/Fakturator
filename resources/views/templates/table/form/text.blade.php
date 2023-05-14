<td class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-my-input datalist="{{$datalist ?? false}}" :options="$options ?? []" name="{{$name ?? ''}}" value="{{$value ?? ''}}" wire:model="{{$model ?? ''}}" :disabled="$disabled ?? false"/>
</td>
