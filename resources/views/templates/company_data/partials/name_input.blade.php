<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-my-input datalist="{{$datalist ?? false}}" :options="$options ?? []" label="{{$label}}" name="{{$name ?? ''}}" value="{{$value ?? ''}}" wire:model="{{$model ?? ''}}">
        @if($datalist === true)
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-button
                        wire:click="setLock()"
                        id="abc"
                        class="h-full rounded-r-md"
                        icon="{{$data['connect'] ? 'lock-closed' : 'lock-open'}}"
                        @if($data['customer_id']) green @else black @endif
                        flat
                        squared
                    />
                </div>
            </x-slot>
        @endif
    </x-my-input>
</div>
