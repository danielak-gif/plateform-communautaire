<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=DM+Serif+Display&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background:#f5f3ef; color:#1c1c1a">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

            <div class="mb-6">
                <a href="/">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="logo" style="max-width:140px; max-height:56px; width:auto; height:auto;">
                </a>
            </div>

            <div class="w-full sm:max-w-md px-8 py-7 bg-white border border-stone-200 overflow-hidden sm:rounded-2xl">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>