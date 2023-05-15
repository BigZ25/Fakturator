<div>
    <div class="text-white bg-gray-900">
        <div class="grid grid-cols-12 h-full">
            <div class="col-span-2">
                <div class="flex flex-col h-full">
                    <div class="bg-gray-900 h-12">
                        <a href="{{route('home')}}"><p class="text-center text-2xl">FAKTURATOR</p></a>
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
                            @if(!auth()->user()->is_active)
                                <div class="pb-3">
                                    <x-card color="bg-orange-500 flex" rounded="rounded-sm">
                                        <h1 class="text-white text-lg">Twoje konto nie zostało jeszcze aktywowane. Bez tego korzystanie z aplikacji będzie niemożliwe.</h1>
                                    </x-card>
                                </div>
                            @endif
                            @if(!auth()->user()->company_data_complete)
                                <div class="pb-3">
                                    <x-card color="bg-orange-500 flex" rounded="rounded-sm">
                                        <h1 class="text-white text-lg">Kliknij <a class="hover:text-secondary-500" href="{{route('settings.form')}}" style="text-decoration: underline;">tutaj</a> aby uzupełnić dane firmy. Bez tego wystawianie faktur będzie niemożliwe.</h1>
                                    </x-card>
                                </div>
                            @endif
                            @include('templates.header')
                            @include($path,$component_data ?? [])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

