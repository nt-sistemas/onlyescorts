<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="onlytheme2">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    <!--<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>-->
    @vite(['resources/css/app.css', 'resources/css/lightbox.css', 'resources/js/app.js', 'resources/js/lightbox.js', 'resources/js/lightbox-plus-jquery.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />



</head>

<body class="min-h-screen min-w-[350px] font-sans antialiased site_body ">
    <header class="flex items-center justify-center h-16 gap-3 bg-secondary">
        <a href="{{ route('site.home') }}" wire:navigate class="btn btn-primary">
            <x-icon name="o-home" />
            <span class="">
                Home
            </span>
        </a>
        <a href="{{ route('site.register') }}" wire:navigate class="btn btn-primary">
            <x-icon name="o-document-text" />
            <span class="">
                Free Register
            </span>
        </a>
        <a href="{{ route('login') }}" wire:navigate class="btn btn-primary">
            <x-icon name="o-lock-closed" />
            <span class="">
                Login
            </span>
        </a>
    </header>
    <div>
        {{ $slot }}
    </div>


    <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/lightbox.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true,
            'maxWidth': 200
        })
    </script>

</body>

</html>
