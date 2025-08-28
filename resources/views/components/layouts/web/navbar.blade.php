<header class="bg-gray-950/60 backdrop-blur-lg py-4 sticky top-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 md:px-6 flex items-center justify-between">
        <!-- Logo -->
        <img src="{{ asset('logo-dark.webp') }}" alt="AfterSay" class="h-7">

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-8">
            <a href="#features" class="text-gray-300 hover:text-blue-400 transition-colors">Features</a>
            <a href="#pricing" class="text-gray-300 hover:text-blue-400 transition-colors">Pricing</a>
            <a href="#contact" class="text-gray-300 hover:text-blue-400 transition-colors">Contact</a>
        </nav>

        <!-- CTA Button -->
        <a href="{{ route('register') }}" class="inline-block px-6 py-2 rounded-full text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-lg">Get Started Free</a>
    </div>
</header>