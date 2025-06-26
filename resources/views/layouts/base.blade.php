<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

    <title>@yield('title') - {{ config('app.name') }}</title>
    @else
    <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @yield('body')
<script>
        window.WirechatConfig = {
            notifications: {
                enabled: {{ config('wirechat.notifications.enabled') ? 'true' : 'false' }}
            }
        };

        if ('serviceWorker' in navigator && WirechatConfig.notifications.enabled) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register(
                    '/chat/public/{{ config("wirechat.notifications.main_sw_script") }}',
                    { scope: '/chat/public/' }
                )
                .then(reg => console.log('SW scope:', reg.scope))
                .catch(err => console.error('SW register failed:', err));
            });
        }
    </script>

</body>

</html>