@if(!isset($disabled) || (isset($disabled) && $disabled === false))
    <x-button amber label="Edytuj" icon="pencil" href="{{$route}}"/>
@else
    <x-button amber label="Edytuj" icon="pencil" disabled/>
@endif
