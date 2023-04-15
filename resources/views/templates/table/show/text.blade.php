<td class="text-{{$align ?? 'center'}}">
    @foreach($rows as $row)
        @if($row['text'] !== null)
            <p class="m-0 p-0">
                @if(isset($row['label']))
                    <b>{{$row['label']}}:</b>
                @endif
                @if(isset($row['route']))
                    <a href="{{$row['route']}}" onMouseOver="this.style.color='dodgerblue'" onMouseOut="this.style.color='black'">
                        @if(isset($row['icon']))
                            <i class="fa {{$row['icon']}} mr-1"></i>
                        @endif
                        {{$row['text']}}
                    </a>
                @else
                    @if(isset($row['icon']))
                        <i class="fa {{$row['icon']}} mr-1"></i>
                    @endif
                    {{$row['text']}}
                @endif
            </p>
        @endif
    @endforeach
</td>
