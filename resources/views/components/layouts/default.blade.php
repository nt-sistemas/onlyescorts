<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="onlytheme2">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/css/lightbox.css', 'resources/js/app.js', 'resources/js/lightbox.js', 'resources/js/lightbox-plus-jquery.js'])

</head>

<body class="min-h-screen min-w-[350px] font-sans antialiased site_body">
{{ $slot }}

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
