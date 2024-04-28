<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="onlytheme2">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    {{-- Cropper.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />

    <link rel="stylesheet" href="{{ asset('dist/css/lightbox.css') }}">


    {{-- Sortable.js --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.1/Sortable.min.js"></script>



    @vite(['resources/css/app.css', 'resources/css/lightbox.css', 'resources/js/app.js', 'resources/js/lightbox.js', 'resources/js/lightbox-plus-jquery.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-100/50">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-icon name="o-square-3-stack-3d" class="text-primary" />
            <div>Only Escorts</div>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="mr-3 lg:hidden">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-secondary lg:bg-secondary">

            {{-- BRAND --}}
            <div class="flex flex-col items-center h-24 gap-3 p-3">
                <img class="w-24" src="{{ asset('assets/images/logo.svg') }}" />
            </div>

            {{-- MENU --}}
            <x-menu class="text-white">

                {{-- User --}}
                @if ($user = auth()->user())
                    <x-list-item :item="$user" sub-value="username" no-separator no-hover
                        class="!-mx-2 mb-5 mt-2 border-y border-y-sky-900">
                        <x-slot:actions>
                            <livewire:auth.logout />
                        </x-slot:actions>
                    </x-list-item>
                @endif

                <x-menu-item title="Home" icon="s-home-modern" link="{{ route('main') }}" />
                <x-menu-item title="Stories" icon="s-film" link="#" />
                <x-menu-item title="Profile" icon="s-user-circle" link="{{ route('profile') }}" />
                <x-menu-item title="Medias" icon="s-photo" link="{{ route('uploads') }}" />

            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />

    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->

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
