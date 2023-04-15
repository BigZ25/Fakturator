<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.button',['action' => 'markAsRead()', 'disabled' => (bool)$notification->was_viewed,'color' => 'pink','label' => 'Zaznacz jako przeczytane','icon' => 'check'])
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Tytuł','value' => $notification->title])
            @include('templates.show.row',['label' => 'Treść','value' => $notification->content])
            @include('templates.show.row',['label' => 'Link','value' => $notification->link,'route' => $notification->link])
        </x-card>
    </div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.button',['route' => $notification->link,'color' => 'lime','label' => 'Zobacz','icon' => 'eye', 'blank' => true])
        </x-card>
    </div>
</div>
