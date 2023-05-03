<div>
    @livewire('templates.delete')
    <x-card title="Klienci" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block w-full p-2">

                    @include($theme->layout->header, [
                        'enabledFilters' => $enabledFilters
                    ])

                    @if(config('livewire-powergrid.filter') === 'outside')
                        @if(count($makeFilters) > 0)
                            <div>
                                <x-livewire-powergrid::frameworks.tailwind.filter
                                    :makeFilters="$makeFilters"
                                    :inputTextOptions="$inputTextOptions"
                                    :tableName="$tableName"
                                    :filters="$filters"
                                    :theme="$theme"
                                />
                            </div>
                        @endif
                    @endif

                    <div class="{{ $theme->table->divClass }}" style="{{ $theme->table->divStyle }}">
                        @include($table)
                    </div>

                    @include($theme->footer->view)
                </div>
            </div>
        </div>
    </x-card>
</div>
