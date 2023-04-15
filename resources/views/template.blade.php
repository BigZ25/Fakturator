<div>
    <div class="text-white bg-gray-900">
        <div class="grid grid-cols-12 h-full">
            <div class="col-span-2">
                <div class="flex flex-col h-full">
                    <div class="bg-gray-900 h-12">
                        <p class="text-center text-2xl">WYSTAWIACZ</p>
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
                            <a href="{{config('log-viewer.route_path')}}" target="_blank">
                                <li class="rounded-sm p-2 cursor-pointer hover:bg-blue-800">
                                    <i class="fas fa-fw fa-bug mr-1"></i>Błędy
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-10" wire:loading.class="blur">
                <div class="flex flex-col h-full">
                    <div class="bg-gray-800 h-full">
                        <div class="p-2">
                            @if(code() === false)
                                <div class="pb-3">
                                    <x-card color="bg-orange-500 flex" rounded="rounded-sm">
                                        <h1 class="text-white text-lg">Kliknij <a class="hover:text-secondary-500" href="{{codeUrl()}}" style="text-decoration: underline;">tutaj</a> aby uzyskać kod dostępu OLX. Bez niego wystawianie ogłoszeń będzie niemożliwe.</h1>
                                    </x-card>
                                </div>
                            @else
                                <div class="pb-3">
                                    <x-card color="bg-pink-500 flex" rounded="rounded-sm">
                                        <h1 class="text-white text-lg">Kliknij <a class="hover:text-secondary-500" onclick="$openModal('removeCode')" style="text-decoration: underline; cursor: pointer;">tutaj</a> aby usunąć kod dostępu OLX.</h1>
                                    </x-card>
                                </div>
                                <x-modal.card title="Usuwanie kodu dostępu OLX" blur wire:model.defer="removeCode">
                                    <form method="POST" action="{{route('remove_code')}}" id="removeCodeForm">
                                        @csrf
                                        <div>
                                            <h1 class="text-2xl">Czy napewno chcesz usunąć kod dostępu OLX?</h1>
                                        </div>
                                        <x-slot name="footer">
                                            <div class="flex justify-end">
                                                <x-button red label="Tak" class="mr-2" type="submit" form="removeCodeForm"/>
                                                <x-button flat label="Nie" class="mr-2" x-on:click="close"/>
                                            </div>
                                        </x-slot>
                                    </form>
                                </x-modal.card>

                            @endif
                            @include('templates.header')
                            @include($path,$data)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

