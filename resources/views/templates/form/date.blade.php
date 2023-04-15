<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    {{--    @if(isset($value))--}}
    <x-datetime-picker
        label="{{$label}}"
        name="{{$name ?? ''}}"
        value="{{$value ?? ''}}"
        wire:model="{{$model ?? ''}}"
        display-format="DD-MM-YYYY"
    />
    {{--    @else--}}
    {{--        <x-input label="{{$label}}" name="{{$name}}"/>--}}
    {{--    @endif--}}
</div>
