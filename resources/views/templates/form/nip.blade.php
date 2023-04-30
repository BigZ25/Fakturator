<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-inputs.maskable label="{{$label}}" name="{{$name ?? ''}}" value="{{$value ?? ''}}" wire:model="{{$model ?? ''}}" mask="#############">
        <x-slot name="append">
            <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                <x-button class="h-full rounded-r-md fa fa-search primary flat squared" wire:click="searchByNIP()"/>
            </div>
        </x-slot>
    </x-inputs.maskable>
</div>
