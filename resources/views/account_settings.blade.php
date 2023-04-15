<div>
    <form method="POST" action="{{route('account_settings.store')}}" enctype="multipart/form-data" class="ajax-form">
        @if($user->id)
            @method('PUT')
        @endif
        @csrf
        <div class="pb-3">
            <x-card title="Podstawowe dane" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 25,'value' => $user->name,'name' => 'name', 'label' => 'Imię'])
                    @include('templates.form.text',['width' => 25,'value' => $user->surname,'name' => 'surname', 'label' => 'Nazwisko'])
                    @include('templates.form.text',['width' => 25,'value' => $user->login,'name' => 'login' ,'label' => 'Login'])
                    @include('templates.form.password',['width' => 25 ,'name' => 'new_password','label' => 'Nowe hasło'])
                </div>
                <div class="flex flex-wrap">
                    @include('templates.form.text',['width' => 25,'value' => $user->email,'name' => 'email', 'label' => 'Adres e-mail'])
                    @include('templates.form.text',['width' => 25,'value' => $user->phone,'name' => 'phone' ,'label' => 'Numer telefonu'])
                </div>
            </x-card>
        </div>
        @include('templates.buttons.update')
    </form>
</div>
