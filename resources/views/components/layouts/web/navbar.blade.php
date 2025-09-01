<div x-data="{openMenu: false}" @click.outside="openMenu = false">
    <header class="bg-gray-950/60 backdrop-blur-lg py-4 sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 md:px-6 flex items-center justify-between">
            <!-- Logo -->
            <img src="{{ asset('logo-dark.webp') }}" alt="AfterSay" class="h-7">
    
            {{-- Navigation --}}
            <button @click="openMenu = !openMenu" class="font-bold sm:hidden" x-cloak>MENU</button>
            <nav class="hidden sm:flex items-center space-x-8" x-cloak>
                <a href="#features" class="block text-gray-300 hover:text-blue-400 transition-colors">Features</a>
                <a href="#pricing" class="block text-gray-300 hover:text-blue-400 transition-colors">Pricing</a>
                <a href="#about" class="block text-gray-300 hover:text-blue-400 transition-colors">About</a>
                <a href="{{ route('login') }}" class="block px-4 py-2 border rounded-lg tracking-wide font-medium text-white bg-transparent hover:bg-white/10 transition-all">Log In</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 border rounded-lg tracking-wide font-medium text-black bg-white hover:bg-white/80 transition-all">Try it for Free</a>
            </nav>
        </div>
        <nav x-show="openMenu" class="max-w-7xl mx-auto p-4 space-y-2 pt-6 sm:hidden" x-cloak>
            <a href="#features" class="block text-gray-300 hover:text-blue-400 transition-colors">Features</a>
            <a href="#pricing" class="block text-gray-300 hover:text-blue-400 transition-colors">Pricing</a>
            <a href="#about" class="block text-gray-300 hover:text-blue-400 transition-colors">About</a>
            <a href="{{ route('login') }}" class="block mt-4 px-4 py-2 border rounded-lg tracking-wide font-medium text-white bg-transparent hover:bg-white/10 transition-all">Log In</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 border rounded-lg tracking-wide font-medium text-black bg-white hover:bg-white/80 transition-all">Try it for Free</a>
        </nav>
    </header>
</div>