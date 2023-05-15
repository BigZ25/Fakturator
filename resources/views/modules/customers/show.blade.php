<div>
    @livewire('templates.delete')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.edit',['route' => route('customers.edit',$customer->id), 'disabled' => $customer->is_active || $customer->is_in_queue])
            @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($customer),'\\').'",'.$customer->id.')'])
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.company_data.show',['entity' => $customer])
            @include('templates.show.timestamp',['entity' => $customer])
        </x-card>
    </div>
    @livewire('modules.invoices.invoices-index',['inject' => true,'buyer_customer_id' => $customer->id])
</div>
