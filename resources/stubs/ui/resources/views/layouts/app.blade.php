<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name') }}</title>

    <livewire:styles/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" href="{{ mix('images/icon-fav.png') }}">
    <link rel="apple-touch-icon" href="{{ mix('images/icon-touch.png') }}">
    <link rel="manifest" href="{{ mix('json/manifest.json') }}">
</head>
<body class="bg-light">
    <livewire:layouts.nav/>

    {{ $slot }}

    <livewire:loader/>
    <livewire:modals/>
    <livewire:toasts/>
    <livewire:scripts/>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
