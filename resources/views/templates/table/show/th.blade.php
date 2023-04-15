<th class="text-{{$align ?? "center"}}">
    @if(isset($sort_col_id))
        <button class="btn btn-sm m-0 p-0" wire:click="sortBy('{{$sort_col_id}}')">
            <b>{{$label}}</b>
            @if($sort_col_id === $sorting_col && $sorting_dir === 'asc')
                <i class="fa fa-fw fa-sort-up"></i>
            @elseif($sort_col_id === $sorting_col && $sorting_dir === 'desc')
                <i class="fa fa-fw fa-sort-down"></i>
            @else
                <i class="fa fa-fw fa-sort" style="color: grey;"></i>
            @endif
        </button>
    @else
        {{$label}}
    @endif
</th>
