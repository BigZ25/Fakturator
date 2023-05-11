@if(isset($title))
    <div class="pb-3">
        <h1 class="text-2xl">{{$title}}</h1>
        @if(isset($breadcrumbs) && $breadcrumbs)
            <h1 class="mt-1"><a class="hover:text-primary-500" href="{{$breadcrumbs['route']}}">{{$breadcrumbs['label']}}</a></h1>
        @endif
    </div>
@endif
