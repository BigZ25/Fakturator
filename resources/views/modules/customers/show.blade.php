<div>
    @livewire('templates.delete')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            {{--            @include('modules/customers/modals/delete_single',['item' => $customer])--}}
            {{--            @include('templates.buttons.edit',['route' => route('customers.edit',$customer->id), 'disabled' => $customer->is_active || $customer->is_in_queue])--}}
            {{--            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$customer->id.')','disabled' => $customer->is_in_queue])--}}
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Nazwa','value' => $customer->name])
            {{--            @include('templates.show.row',['label' => 'Opis','value' => $customer->description])--}}
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Przedmioty w kolekcji" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @livewire('modules.customers.items.customer-items-index',['customer' => $customer])
        </x-card>
    </div>
</div>
