<x-layouts.web>
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="py-12 space-y-3">
            <flux:heading level="1" size="xl">From the blog</flux:heading>
            <flux:text>Observations on the mechanics of reputation, the math of trust, and the systems that build calm businesses.</flux:text>
        </div>

        <div class="space-y-6">
            @forelse ($articles as $article)
                <article class="group">
                    <time class="block font-mono text-[10px] uppercase tracking-widest text-slate-400">{{ $article->published_at?->format('M d, Y') }}</time>
                    <flux:heading level="2" size="xl" class="font-lora">
                        <a href="{{ route('blog.show', ['slug' => $article->slug]) }}" class="hover:text-blue-700 dark:hover:text-blue-600 transition-colors">{{ $article->title }}</a>
                    </flux:heading>
                    <flux:text>
                        {{ $article->excerpt }}
                    </flux:text>
                </article>
            @empty
            @endforelse
        </div>
    </div>
</x-layouts.web>
