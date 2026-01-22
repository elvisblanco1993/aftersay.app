<x-layouts.web>
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="py-12 space-y-3">
            <a href="{{ route('blog.index') }}" class="inline-block hover:underline">
                <flux:text>Back to the Aftersay Blog</flux:text>
            </a>
            <flux:heading size="xl" class="font-lora text-4xl">{{ $article->title }}</flux:heading>
        </div>

        <div class="prose-sm dark:prose-invert max-w-full">{!! $article->content !!}</div>
    </div>
</x-layouts.web>
