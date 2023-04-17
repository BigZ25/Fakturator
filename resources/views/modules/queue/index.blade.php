<div>
    @include('modules.queue.search')

    <x-card title="Pozycje w kolejce" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($items) > 0)
            <div class="mb-2">
                {!! $items->links() !!}
            </div>

            <table class="w-full table-auto text-left border">
                <thead>
                <tr>
                    @if(!$inject)
                        @include('templates.table.show.th',['label' => "Ogłoszenie", 'align' => 'left'])
                    @endif
                    @include('templates.table.show.th',['label' => "Rodzaj operacji"])
                    @include('templates.table.show.th',['label' => "Sukces"])
                    @include('templates.table.show.th',['label' => "Odpowiedź", 'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Data wykonania"])
                    @include('templates.table.show.th',['label' => "Szczegóły"])
                </tr>
                </thead>
                <tbody class="border">
                @foreach($items as $item)
                    <tr>
                        @if(!$inject)
                            @include('templates.table.show.text',['align' => 'left','rows' => [['route' => !$item->invoice->deleted_at ? route('invoices.show',$item->invoice_id) : null,'text' => \Illuminate\Support\Str::limit($item->invoice?->full_name, 50, $end='...') ?? "-"]]])
                        @endif
                        @include('templates.table.show.text',['rows' => [['text' => $item->operation_text]]])
                        @include('templates.table.show.text',['rows' => [['text' => $item->success_text]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => \Illuminate\Support\Str::limit($item->response_message, 50, $end='...')]]])
                        @include('templates.table.show.text',['rows' => [['text' => $item->executed_at ?? "-"]]])
                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('queue.show',$item->id)])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $items->links() !!}
            </div>
        @else
            <p>Brak pozycji</p>
        @endif
    </x-card>
</div>
