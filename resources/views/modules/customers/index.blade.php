<div>
    @livewire('templates.delete')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj klienta', 'route' => route('customers.create')])
        </x-card>
    </div>
    <x-card title="Klienci" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @livewire('modules.customers.customers-table')
    </x-card>
</div>
