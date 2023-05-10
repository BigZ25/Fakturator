<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    <x-my-datetime-picker
        without-time="true"
        label="{{$label}}"
        name="{{$name ?? ''}}"
        :value="$value ?? null"
        wire:model="{{$model ?? ''}}"
        display-format="YYYY-MM-DD"
    />
</div>
