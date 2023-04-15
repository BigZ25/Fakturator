<td class="text-{{$align ?? 'center'}}">
    @if(!isset($disabled) || (isset($disabled) && $disabled === false))
        @if(isset($route))
            <x-button color="{{$color}}" label="{{$label}}" icon="{{$icon}}" href="{{$route}}" target="{{isset($blank) && $blank === true ? '_blank' : ''}}"/>
        @endif

        @if(isset($action))
            <x-button color="{{$color}}" label="{{$label}}" icon="{{$icon}}" wire:click="{{$action}}"/>
        @endif
    @else
        <x-button color="{{$color}}" label="{{$label}}" icon="{{$icon}}" disabled/>
    @endif
</td>
