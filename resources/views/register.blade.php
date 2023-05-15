@extends('index')
@section('template')
    <div class="h-full text-white">
        <div class="flex flex-col h-screen">
            <div class="bg-gray-800 h-full">
                <div class="flex justify-center items-center h-screen">
                    <div class="p-2" style="width: 50%">
                        <h1 class="text-5xl text-center my-6">FAKTURATOR</h1>
                        <x-card title="Rejestracja" color="bg-white flex" rounded="rounded-sm" cardClasses="card-body">
                            <form method="POST" action="{{route('register.post')}}" class="ajax-form" data-captcha="true">
                                @csrf
                                @include('templates.form.text',['width' => 100,'name' => 'name', 'label' => 'Imię'])
                                @include('templates.form.text',['width' => 100,'name' => 'surname', 'label' => 'Nazwisko'])
                                @include('templates.form.text',['width' => 100,'name' => 'email', 'label' => 'Adres e-mail'])
                                @include('templates.form.password',['width' => 100,'name' => 'password', 'label' => 'Hasło'])
                                @include('templates.form.password',['width' => 100,'name' => 'confirm_password', 'label' => 'Powtórz hasło'])
                                @include('templates.form.captcha')
                                <div class="my-6 ml-2">
                                    <x-button info label="Zarejestruj" class="mr-2" type="submit"/>
                                    <x-button outline info label="Zaloguj się" class="mr-2" type="button" href="{{route('login.form')}}"/>
                                </div>
                            </form>
                        </x-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
