<td class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-my-input datalist="{{$datalist ?? false}}" :options="$options ?? []" name="{{$name ?? ''}}" value="{{$value ?? ''}}" wire:model="{{$model ?? ''}}" :disabled="$disabled ?? false">
        <x-slot name="append">
            <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                <x-button
                    wire:click="setLock({{$index}})"
                    id="abc"
                    class="h-full rounded-r-md"
                    icon="{{$items[$index]['connect'] ? 'lock-closed' : 'lock-open'}}"
                    @if($items[$index]['product_id']) green @else black @endif
                    flat
                    squared
                />
            </div>
        </x-slot>
    </x-my-input>
</td>
