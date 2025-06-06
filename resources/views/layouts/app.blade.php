<!DOCTYPE html>
<html  class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/x-icon" href="{{ asset('images/aawtar.png') }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .aa:hover{
                opacity: 0.4;
            }
            .aa{
                padding-top: 10px;
                width:50%;
                height:80px;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-white dark:bg-black" dir="{{ session('lang')=='ar'? "rtl" : "ltr" }}">
        <div class="min-h-screen bg-white dark:bg-black">
            @include('layouts.navigation')
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
