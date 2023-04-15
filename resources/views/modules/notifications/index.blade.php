<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.button',['action' => 'markAllAsRead()','color' => 'pink','label' => 'Zaznacz wszystko jako przeczytane','icon' => 'check'])
            @include('templates.buttons.button',['action' => 'deleteAll()','color' => 'red','label' => 'Usuń wszystkie','icon' => 'trash'])
            @include('templates.buttons.button',['action' => 'refresh()','color' => 'blue','label' => 'Odśwież','icon' => 'refresh'])
        </x-card>
    </div>
    <x-card title="Powiadomienia" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
        @if(count($notifications) > 0)
            @include('templates.buttons.button',['action' => 'deleteFromCurrentPage()','color' => 'red','label' => 'Usuń','icon' => 'trash'])

            <div class="mb-2">
                {!! $notifications->links() !!}
            </div>

            <table class="w-full table-auto text-left border">
                <thead>
                <tr>
                    @include('templates.table.show.th',['label' => "L.p."])
                    @include('templates.table.show.th',['label' => "Data i czas"])
                    @include('templates.table.show.th',['label' => "Tytuł",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Treść",'align' => 'left'])
                    @include('templates.table.show.th',['label' => "Zobacz"])
                    @include('templates.table.show.th',['label' => "Szczegóły"])
                    @include('templates.table.show.th',['label' => "Zaznacz jako przeczytane"])
                </tr>
                </thead>
                <tbody class="border">
                @foreach($notifications as $notification)
                    <tr @if(!$notification->was_viewed) class="bg-teal-500" @endif>
                        @include('templates.table.show.text',['rows' => [['text' => $loop->index + 1]]])
                        @include('templates.table.show.text',['rows' => [['text' => $notification->created_at ?? '-']]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => $notification->title]]])
                        @include('templates.table.show.text',['align' => 'left','rows' => [['text' => substr($notification->content,0,50)]]])
                        @include('templates.table.show.button',['label' => 'Zobacz','color' => 'lime','icon' => 'eye','route' => $notification->link, 'blank' => true])
                        @include('templates.table.show.button',['label' => 'Szczegóły','color' => 'info','icon' => 'document-text','route' => route('notifications.show',$notification->id)])
                        @include('templates.table.show.button',['label' => 'Zaznacz jako przeczytane','color' => 'pink','icon' => 'check','action' => 'markAsRead('.$notification->id.')','disabled' => (bool)$notification->was_viewed])
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $notifications->links() !!}
            </div>
        @else
            <p>Brak powiadomień</p>
        @endif
    </x-card>
</div>
