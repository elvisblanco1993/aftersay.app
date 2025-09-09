<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.website-head')
    </head>
    <body class="bg-gray-950 text-gray-100">
        @include('components.layouts.web.navbar')
        {{ $slot }}
        @include('components.layouts.web.footer')
        @fluxScripts
    </body>
</html>
