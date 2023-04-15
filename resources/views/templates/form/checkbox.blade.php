<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-binary-checkbox label="{{$label}}" name="{{$name ?? ''}}" value="{{$value ?? 0}}" wire:model="{{$model ?? ''}}"/>
</div>
