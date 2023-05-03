<div>
    <div class="text-white bg-gray-900">
        <div class="grid grid-cols-12 h-full">
            <div class="col-span-2">
                <div class="flex flex-col h-full">
                    <div class="bg-gray-900 h-12">
                        <p class="text-center text-2xl">FAKTURATOR</p>
                    </div>
                    <div class="bg-gray-900 h-full">
                        <ul class="list-none hover:list-disc">
                            @foreach(config('modules') as $key => $module)
                                <a href="{{route($module['route'])}}">
                                    <li class="rounded-sm p-2 cursor-pointer hover:bg-blue-800 @if(isset($currentModule) && $currentModule === $key) bg-blue-500 @endif">
                                        <i class="fas fa-fw {{$module['icon']}} mr-1"></i>{{$module['label']}}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-10">
                <div class="flex flex-col h-full">
                    <div class="bg-gray-800 h-full">
                        <div class="p-2">
                            @include('templates.header')
                            @include($path,$component_data ?? [])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

