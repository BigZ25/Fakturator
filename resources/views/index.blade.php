<html>
<head>
    @livewireScripts
    @wireUiScripts
    <script type="text/javascript" src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/browser_notifications.js')}}"></script>

    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(isset($title))
        <title>{{$title}} | Wystawiacz</title>
    @else
        <title>Wystawiacz</title>
    @endif
</head>
<body @if(session()->has('message')) data-notification-content="{{session()->get('message')['content']}}" data-notification-type="{{session()->get('message')['type']}}" @endif>
<x-notifications/>
@yield('template')
</body>
</html>
