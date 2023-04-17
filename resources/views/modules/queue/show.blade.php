<div>
    @if(!$item->invoice->deleted_at)
        <div class="pb-3">
            <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
                @include('templates.buttons.button',['label' => 'Pokaż ogłoszenie','color' => 'info','icon' => 'document-text','route' => route('invoices.show',$item->invoice_id)])
            </x-card>
        </div>
    @endif
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Ogłoszenie','value' => $item->invoice?->full_name,'route' => !$item->invoice->deleted_at ? route('invoices.show',$item->invoice_id) : null])
            @include('templates.show.row',['label' => 'Rodzaj operacji','value' => $item->operation_text])
            @include('templates.show.row',['label' => 'Sukces','value' => $item->success_text])
            @include('templates.show.row',['label' => 'Odpowiedź','value' => $item->response_message])
            @include('templates.show.row',['label' => 'Data dodania','value' => $item->created_at])
            @include('templates.show.row',['label' => 'Data wykonania','value' => $item->executed_at ?? "-"])
        </x-card>
    </div>
</div>
