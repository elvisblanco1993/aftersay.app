<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.website-head')
    </head>
    <body class="bg-gray-950 text-gray-100">
        @unless (request()->routeIs('waitlist.join'))
            @include('components.layouts.web.navbar')
        @else
        @endunless
        {{ $slot }}
        @unless (request()->routeIs('waitlist.join'))
            @include('components.layouts.web.footer')
        @else
        @endunless
        @fluxScripts
    </body>
</html>
