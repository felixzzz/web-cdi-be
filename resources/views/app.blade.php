<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }} {{ @$pageTitle  ? "| {$pageTitle}" : ''}}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet" rel="preload" href="https://muhammadlailil.github.io/iconsax/style/iconsax.css"/>

        <link rel="shortcut icon" href="{{ asset('assets/frontend/logo_cdi_white.svg') }}" type="image/x-icon">

        @routes
        @vite(['resources/js/app.ts'])
        @include('partials.header-app')
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
