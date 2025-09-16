<main>
    <div class="max-w-7xl mx-auto py-4 px-4 md:px-6 flex items-center justify-between">
        <img src="{{ asset('logo-dark.webp') }}" alt="AfterSay" class="h-7">
    </div>
    {{-- Hero --}}
    <section class="relative sm:min-h-screen flex items-center justify-center text-center py-20 px-4 md:px-6 overflow-hidden hero-pattern">
        <!-- Background Blob -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-128 h-128 bg-pink-500/50 rounded-full opacity-10 blur-3xl animate-pulse duration-1000"></div>
            <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-green-600/40 rounded-full opacity-15 blur-3xl animate-pulse delay-800"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight tracking-tight text-white mb-4">
                Effortlessly Grow Your Business with More 5-Star Reviews.
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-8">AfterSay is the all-in-one platform that automates customer feedback collection, helps you manage your online reputation, and turns happy clients into powerful brand advocates.</p>
            <form wire:submit="save">
                @csrf
                <div class="flex items-center gap-4 w-full max-w-sm mx-auto">
                    <flux:input type="email" wire:model="email" placeholder="Enter your email" class="w-full" />
                    <flux:button type="submit" variant="primary" color="green">Join Waitlist</flux:button>
                </div>
            </form>

            <div x-data="{ joined: false }" @joined.window="joined = true" x-cloak>
                <div class="text-center mt-6 px-4 py-2 bg-green-500/20 rounded-lg" x-show="joined" x-transition>
                    Thanks for joining our waitlist. We’ll send you your early access invite by email later this month.
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-6">Join our early access waitlist and get 50% off for life.</p>
        </div>
    </section>
    <div class="max-w-7xl mx-auto py-4 px-4 md:px-6 flex items-center justify-center">
        <p class="text-sm text-zinc-500">Built with ❤️ by <a href="https://elvisbg.dev" class="underline" target="_elvisbgdotdev">Elvis Blanco</a></p>
    </div>
</main>
