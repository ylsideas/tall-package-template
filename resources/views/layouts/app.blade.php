<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/vendor/skeleton/favicon.ico') }}">

        <title>{{ config('skeleton.name', 'Skeleton') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(mix('app.css', 'vendor/skeleton')) }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset(mix('app.js', 'vendor/skeleton')) }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
