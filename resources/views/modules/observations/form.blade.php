<div>
    @if($observation->id)
        <div class="pb-3">
            <x-card padding="p-2" color="bg-white" rounded="rounded-sm">
                @include('modules.observations.modals.delete_single',['item' => $observation])
                @include('templates.buttons.button',['label' => 'Usuń','color' => 'red','icon' => 'trash','action' => 'openDeleteSingleModal('.$observation->id.')'])
            </x-card>
        </div>
    @endif

    <form method="POST" action="{{$observation->id ? route('observations.update',$observation->id) : route('observations.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($observation->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 50,'value' => $observation->name,'name' => 'name' ,'label' => 'Nazwa'])
                    @include('templates.form.select',['label' => 'Częstotliwość sprawdzania','options' => \App\Enum\Modules\Observations\FrequencyEnum::getSelectList(),'name' => 'frequency', 'value' => $observation->frequency, 'width' => 50])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.checkbox',['label' => 'Powiadomienia na email','name' => 'email_notification', 'value' => $observation->email_notification,'width' => 30])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.checkbox',['label' => 'Powiadomienia na telefon','name' => 'phone_notification', 'value' => $observation->phone_notification, 'width' => 30])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.checkbox',['label' => 'Powiadomienia w przeglądarce','name' => 'browser_notification', 'value' => $observation->browser_notification, 'width' => 40])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.checkbox',['label' => 'Powiadomienia w aplikacji Pushover','name' => 'pushover_notification', 'value' => $observation->pushover_notification, 'width' => 40])
                </div>
            </x-card>
        </div>
        @livewire('modules.observations.links.observation-links-form',[$observation->id])
        @if($entity_id === null)
            @include('templates.buttons.store')
        @else
            @include('templates.buttons.update')
        @endif
    </form>
</div>
