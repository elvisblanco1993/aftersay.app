<main class="flex-grow flex flex-col items-center justify-center text-center px-6 py-16">
    <h1 class="text-violet-500 text-4xl md:text-5xl sm:text-6xl font-extrabold mb-6">Get More Reviews. Build More Trust.</h1>
    <p class="text-lg max-w-2xl mb-8 text-zinc-600 dark:text-zinc-300">AfterSay helps businesses like yours collect 5-star reviews and testimonials — automatically. Join our waitlist and be among the first to try it out.</p>
    <form wire:submit="save">
        @csrf
        <div class="flex items-center gap-4 w-full max-w-sm">
            <flux:input type="email" wire:model="email" placeholder="Enter your email" class="w-full" />
            <flux:button type="submit" variant="primary">Join Waitlist</flux:button>
        </div>
    </form>

    <div x-data="{ joined: false }" @joined.window="joined = true" x-cloak>
        <div class="text-center mt-6 px-4 py-2 bg-green-500/20 rounded-lg" x-show="joined" x-transition>
            Thanks for joining our waitlist. We’ll send you your early access invite by email later this month.
        </div>
    </div>
    <p class="text-sm text-gray-500 mt-6">Founding members get 50% off for life.</p>
</main>
