<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title') @yield('title') | @endif
        {{ config('app.name') }}
    </title>

    <livewire:styles/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/icon-fav.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon-touch.png') }}">
    <link rel="manifest" href="{{ asset('json/manifest.json') }}">
</head>
<body class="bg-light">
    <livewire:layouts.nav/>

    <div class="container my-3">
        {{ $slot }}
    </div>

    <livewire:modals/>
    <livewire:scripts/>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
