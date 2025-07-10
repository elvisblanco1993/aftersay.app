<header class="max-w-7xl mx-auto w-full flex justify-between items-center p-6">
    <div class="flex items-center gap-2">
        <img src="{{ asset('logo.webp') }}" alt="AfterSay" class="h-7 dark:hidden">
        <img src="{{ asset('logo-dark.webp') }}" alt="AfterSay" class="h-7 hidden dark:block">
    </div>

    <nav class="space-x-4 text-sm font-semibold">
        <a href="{{ route('login') }}" class="hover:underline">Log in</a>
    </nav>
</header>