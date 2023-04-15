<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    {{--    @if(isset($value))--}}
    <x-input label="{{$label}}" name="{{$name ?? ''}}" value="{{$value ?? ''}}" wire:model="{{$model ?? ''}}"/>
    {{--    @else--}}
    {{--        <x-input label="{{$label}}" name="{{$name}}"/>--}}
    {{--    @endif--}}
</div>
