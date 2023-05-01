<div>
    <form method="POST" action="{{route('settings.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($user->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Dane konta" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 25,'value' => $user->name,'name' => 'name', 'label' => 'Imię'])
                    @include('templates.form.text',['width' => 25,'value' => $user->surname,'name' => 'surname', 'label' => 'Nazwisko'])
                    @include('templates.form.text',['width' => 25,'value' => $user->email,'name' => 'email', 'label' => 'Adres e-mail'])
                </div>
                <br>
                <div class="flex flex-wrap">
                    @include('templates.form.password',['width' => 25 ,'name' => 'new_password','label' => 'Nowe hasło'])
                    @include('templates.form.password',['width' => 25 ,'name' => 'confirm_new_password','label' => 'Powtórz nowe hasło'])
                </div>
            </x-card>
        </div>
        <div class="pb-3" style="width: 50%;">
            <x-card title="Dane firmy" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                @livewire('templates.company-data',['prefix' => 'company','entity' => $user])
            </x-card>
        </div>
        @include('templates.buttons.update')
    </form>
</div>
