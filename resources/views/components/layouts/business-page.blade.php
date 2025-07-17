<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="antialiased text-zinc-800 dark:text-zinc-100 dark:bg-zinc-900 bg-white min-h-screen">
        {{ $slot }}
        @fluxScripts
    </body>
</html>
