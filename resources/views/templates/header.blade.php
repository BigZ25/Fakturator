@if(isset($title))
    <div class="flex items-end">
        <div class="pb-3" style="width: 50%">
            <h1 class="text-2xl">{{$title}}</h1>
            @if(isset($breadcrumbs) && $breadcrumbs)
                <h1 class="mt-1"><a class="hover:text-primary-500" href="{{$breadcrumbs['route']}}"><u>{{$breadcrumbs['label']}}</u></a></h1>
            @endif
        </div>
        <div class="pb-3" style="width: 50%; text-align: right">
            <a href="{{route('settings.form')}}"><i class="fas fa-fw fa-user mr-1"></i>{{auth()->user()->email}}</a>
        </div>
    </div>
@endif
