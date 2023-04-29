<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-inputs.maskable label="{{$label}}" name="{{$name ?? ''}}" value="{{$value ?? ''}}" wire:model="{{$model ?? ''}}" mask="##-###"/>
</div>
