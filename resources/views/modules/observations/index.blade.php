<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.new',['label' => 'Dodaj obserwacje', 'route' => route('observations.create')])
        </x-card>
    </div>

    @include('modules.observations.modals.delete_single')
    <div class="pb-3">
        <x-card title="Obserwacje" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @if(count($observations) > 0)
                <div class="mb-2">
                    {!! $observations->links() !!}
                </div>

                <table class="w-full table-auto text-left border">
                    <thead>
                    <tr>
                        @include('templates.table.show.th',['label' => "L.p."])
                        @include('templates.table.show.th',['label' => "Nazwa",'align' => 'left','sort_col_id' => 'full_name_with_item_number'])
                        @include('templates.table.show.th',['label' => "Ilość ogłoszeń",'align' => 'left'])
                        @include('templates.table.show.th',['label' => "Ilość linków",'align' => 'left'])
                        @include('templates.table.show.th',['label' => "Powiadomienia"])
                        @include('templates.table.show.th',['label' => "Szczegóły"])
                        @include('templates.table.show.th',['label' => "Edycja"])
                        @include('templates.table.show.th',['label' => "Usuń"])
                    </tr>
                    </thead>
                    <tbody class="border">
                    @foreach($observations as $observation)
                        <tr>
                            @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                            @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $observation->name]]])
                            @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $observation->number_of_invoices_text]]])
                            @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $observation->number_of_links]]])
                            <td class="text-center">
                                <a href="#!" wire:click="changeNotificationsSettings({{$observation->id}},0)"><i class="fa fa-envelope mr-1 @if($observation->email_notification) text-lime-500 @else text-red-500 @endif"></i></a>
                                <a href="#!" wire:click="changeNotificationsSettings({{$observation->id}},1)"><i class="fa fa-phone mr-1 @if($observation->phone_notification) text-lime-500 @else text-red-500 @endif"></i></a>
                                <a href="#!" wire:click="changeNotificationsSettings({{$observation->id}},2)"><i class="fa fa-window-restore mr-1 @if($observation->browser_notification) text-lime-500 @else text-red-500 @endif"></i></a>
                                <a href="#!" wire:click="changeNotificationsSettings({{$observation->id}},3)"><i class="fa fa-earth mr-1 @if($observation->pushover_notification) text-lime-500 @else text-red-500 @endif"></i></a>
                            </td>
                            @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('observations.show',$observation->id)])
                            @include('templates.table.show.button',['label' => 'Edycja','color' => 'amber','icon' => 'pencil','route' => route('observations.edit',$observation->id)])
                            @include('templates.table.show.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$observation->id.')'])
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {!! $observations->links() !!}
                </div>
            @else
                <p>Brak obserwacji</p>
            @endif
        </x-card>
    </div>
    @livewire('modules.observations.invoices.observation-invoices-index')
</div>
