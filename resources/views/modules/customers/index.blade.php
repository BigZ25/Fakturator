<div>
    @livewire('templates.delete')
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj klienta', 'route' => route('customers.create')])
        </x-card>
    </div>
    <x-card title="Klienci" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @livewire('modules.customers.customers-table')
{{--        @if(count($customers) > 0)--}}
{{--            <div class="mb-2">--}}
{{--                {!! $customers->links() !!}--}}
{{--            </div>--}}

{{--            <table class="w-full table-auto text-left border">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    @include('templates.table.show.th',['label' => "Nazwa",'align' => 'left'])--}}
{{--                    @include('templates.table.show.th',['label' => "NIP",'align' => 'left'])--}}
{{--                    @include('templates.table.show.th',['label' => "Szczegóły"])--}}
{{--                    @include('templates.table.show.th',['label' => "Edycja"])--}}
{{--                    @include('templates.table.show.th',['label' => "Usuń"])--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody class="border">--}}
{{--                @foreach($customers as $customer)--}}
{{--                    <tr>--}}
{{--                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $customer->name]]])--}}
{{--                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $customer->nip]]])--}}
{{--                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('customers.show',$customer->id)])--}}
{{--                        @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('customers.edit',$customer->id), 'disabled' => $customer->is_active || $customer->is_in_queue])--}}
{{--                        @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteModal("'.addcslashes(get_class($customer),'\\').'",'.$customer->id.')','disabled' => $customer->is_in_queue])--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <div class="mt-2">--}}
{{--                {!! $customers->links() !!}--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <p class="text-center">Brak klientów</p>--}}
{{--        @endif--}}
    </x-card>
</div>
