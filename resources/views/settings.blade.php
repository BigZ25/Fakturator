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
        <div class="pb-3">
            <x-card title="Dane firmy" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 25,'value' => $user->company_nip,'name' => 'company_nip', 'label' => 'NIP'])
                    @include('templates.form.text',['width' => 25,'value' => $user->company_name,'name' => 'company_name', 'label' => 'Nazwa firmy'])
                </div>
                <br>
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 25,'value' => $user->company_address,'name' => 'company_address', 'label' => 'Adres'])
                    @include('templates.form.text',['width' => 25,'value' => $user->company_postcode,'name' => 'company_postcode', 'label' => 'Kod pocztowy'])
                    @include('templates.form.text',['width' => 25,'value' => $user->company_city,'name' => 'company_city', 'label' => 'Miasto'])
                </div>
            </x-card>
        </div>
        @include('templates.buttons.update')
    </form>
</div>