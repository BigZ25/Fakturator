<div class="pb-3">
    <x-card title="Linki" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($items) > 0)
            <div class="mb-2">
                {!! $items->links() !!}
            </div>

            <table class="w-full table-auto text-left border">
                <thead>
                <tr>
                    @include('templates.table.show.th',['label' => "L.p."])
                    @include('templates.table.show.th',['label' => "Serwis",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Zobacz"])
                </tr>
                </thead>
                <tbody class="border">
                @foreach($items as $item)
                    <tr>
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['route' => $item->input_link,'text' => $item->website_text,'blank' => true]]])
                        @include('templates.table.show.button',['label' => 'Zobacz','color' => 'lime','icon' => 'eye','route' => $item->input_link,'blank' => true])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $items->links() !!}
            </div>
        @else
            <p>Brak ogłoszeń</p>
        @endif
    </x-card>
</div>
