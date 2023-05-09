<html>
<head>
    @livewireScripts
    @wireUiScripts
    <script type="text/javascript" src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script type="text/javascript" src="{{ asset('js/main.js?v='.filemtime(public_path('js/main.js'))) }}"></script>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(isset($title))
        <title>{{$title}} | Fakturator</title>
    @else
        <title>Fakturator</title>
    @endif
</head>
<body @if(session()->has('message')) data-notification-content="{{session()->get('message')['content']}}" data-notification-type="{{session()->get('message')['type']}}" @endif>
<x-notifications/>
@yield('template')
</body>
</html>
