<header x-data="{openMenu: false}" @click.outside="openMenu = false" class="bg-gray-950/60 backdrop-blur-lg py-4 sticky top-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 md:px-6 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="inline-block">
            <img src="{{ asset('logo-dark.webp') }}" alt="AfterSay" class="h-7">
        </a>

        {{-- Navigation --}}
        <button @click="openMenu = !openMenu" class="font-bold sm:hidden" x-cloak>MENU</button>
        <nav class="hidden sm:flex items-center space-x-8" x-cloak>
            <a href="#features" class="block text-gray-300 hover:text-white transition-colors">Features</a>
            <a href="{{ route('pricing') }}" class="block text-gray-300 hover:text-white transition-colors">Pricing</a>
            <a href="{{ route('about') }}" class="block text-gray-300 hover:text-white transition-colors">About</a>
            <a href="{{ route('login') }}" class="login-btn">Log In</a>
            <a href="{{ route('register') }}" class="register-btn">Try it for Free</a>
        </nav>
    </div>
    <nav x-show="openMenu" class="max-w-7xl mx-auto p-4 space-y-2 pt-6 text-center sm:hidden" x-cloak>
        <a href="#features" class="block text-gray-300 hover:text-white transition-colors">Features</a>
        <a href="{{ route('pricing') }}" class="block text-gray-300 hover:text-white transition-colors">Pricing</a>
        <a href="{{ route('about') }}" class="block text-gray-300 hover:text-white transition-colors">About</a>
        <a href="{{ route('login') }}" class="login-btn">Log In</a>
        <a href="{{ route('register') }}" class="register-btn">Try it for Free</a>
    </nav>
</header>