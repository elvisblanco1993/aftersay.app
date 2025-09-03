<x-layouts.business-page :title="$title">
    <main class="flex flex-col items-center justify-between text-center px-6 py-16 space-y-6">
        <div class="space-y-6">
            <div>
                @if ($page->logo_url)
                    <img src="{{ $page->logo_url }}" alt="{{ $page->tenant->name }} logo" class="h-12 sm:h-24 w-auto mx-auto">
                @endif
            </div>

            <flux:heading level="1" size="xl">Thank you for your feedback</flux:heading>

            <div class="w-full md:min-w-xl md:max-w-xl space-y-6 rounded-2xl bg-white dark:bg-zinc-800 border dark:border-zinc-700 p-6 drop-shadow-xl">
                <flux:text size="lg" class="mt-2">We have received your comments and will review them. A member of our team will contact you if we need any additional information to address your concern.</flux:text>
            </div>
        </div>
        <div class="text-sm text-zinc-500 dark:text-zinc-400">Powered by <a href="{{ route('home') }}?ref={{ $page->slug }}" class="underline">AfterSay</a></div>
    </main>
</x-layouts.business-page>