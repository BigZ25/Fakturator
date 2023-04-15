@if(isset($multiple))
    @foreach($values as $value)
        <input multiple type="{{$type ?? 'text'}}" name={{$name}} value="{{$value}}" style="display: none">
    @endforeach
@else
    <input type="{{$type ?? 'text'}}" name={{$name}} value="{{$value}}" style="display: none">
@endif
