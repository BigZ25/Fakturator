<div class="mb-2 ml-2 mr-2" style="width: {{$width ?? 50}}%">
    @if(isset($value))
        <x-input type="password" label="{{$label}}" name="{{$name}}" value="{{$value}}"/>
    @else
        <x-input type="password" label="{{$label}}" name="{{$name}}"/>
    @endif
</div>
