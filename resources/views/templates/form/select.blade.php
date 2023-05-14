<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-my-select label="{{$label}}" placeholder="{{$placeholder ?? 'Wybierz'}}" :options="$options" option-label="text" option-value="id" name="{{$name ?? null}}" value="{{$value ?? null}}" wire:model="{{$model ?? ''}}" :model="($model ?? false) ? true : false"/>
</div>
