<div>
    <div class="pb-3">
        <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
            @include('templates.buttons.edit',['route' => route('observations.edit',$observation->id), 'disabled' => $observation->is_active || $observation->is_in_queue])
        </x-card>
    </div>
    <div class="pb-3">
        <x-card title="Podstawowe dane" color="bg-white" rounded="rounded-sm" cardClasses="card-body">
            @include('templates.show.row',['label' => 'Nazwa','value' => $observation->name])
            @include('templates.show.row',['label' => 'Częstotliwość sprawdzania','value' => $observation->frequency_text])
            @include('templates.show.row',['label' => 'Wyślij powiadomienia na maila','value' => $observation->email_notification_text])
            @include('templates.show.row',['label' => 'Wyślij powiadomienia na telefon','value' => $observation->phone_notification_text])
            @include('templates.show.row',['label' => 'Pokaż powiadomienia w przeglądarce','value' => $observation->browser_notification_text])
            @include('templates.show.row',['label' => 'Powiadomienia w aplikacji Pushover','value' => $observation->pushover_notification_text])
            @include('templates.show.row',['label' => 'Ilość ogłoszeń','value' => $observation->number_of_invoices_text])
        </x-card>
    </div>
    @livewire('modules.observations.invoices.observation-invoices-index',[$observation->id])
    @livewire('modules.observations.links.observation-links-show',[$observation->id])
</div>
