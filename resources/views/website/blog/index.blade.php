<x-layouts.web>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="text-center py-12 space-y-3">
            <flux:heading size="xl">From the blog</flux:heading>
            <flux:text>Observations on the mechanics of reputation, the math of trust, and the systems that build calm businesses.</flux:text>
        </div>

        <div class="space-y-6">
            @forelse ($articles as $article)
                <article class="group">
                    <time class="block font-mono text-[10px] uppercase tracking-widest text-slate-400 mb-4">{{ $article->published_at?->format('M d, Y') }}</time>
                    <flux:heading level="2" size="xl" class="font-lora">
                        <a href="#" class="hover:text-blue-700 dark:hover:text-blue-600 transition-colors">{{ $article->title }}</a>
                    </flux:heading>
                    <flux:text>
                        {{ $article->excerpt }}
                    </flux:text>
                    <a href="#" class="text-xs tracking-wider transition-all border-b hover:border-blue-700 dark:hover:border-blue-600">Read Article</a>
                </article>
            @empty
            @endforelse
        </div>
    </div>
</x-layouts.web>
