@if(isset($route))
    <p>@if(isset($label))<b>{{$label}}: </b>@endif<a href="{{$route}}" onMouseOver="this.style.color='dodgerblue'" onMouseOut="this.style.color='black'">{{$value}}</a></p>
@else
    <p>@if(isset($label))<b>{{$label}}: </b>@endif{{$value}}</p>
@endif
