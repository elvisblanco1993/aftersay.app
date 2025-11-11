<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Testimonials</flux:heading>
    </div>

    <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search..." class="w-full sm:max-w-xs" />

    @forelse ($testimonials as $testimonial)
        <div class="w-full card space-y-4 px-4 py-6">
            <div class="space-y-2 block">
                <h3 class="text-lg font-semibold">{{ $testimonial->title }}</h3>
                <flux:text>{{ $testimonial->content }}</flux:text>
            </div>

            <div class="flex items-center gap-3">
                <flux:avatar :src="$testimonial->author_headshot" />
                <div class="space-y-0.5 block">
                    <p class="font-medium">{{ $testimonial->author_name }}</p>
                    @if ($testimonial->author_title && $testimonial->company)
                        <p class="text-sm font-light">{{ $testimonial->author_title }} at {{ $testimonial->company }}</p>
                    @endif
                </div>
            </div>

            <flux:separator />

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <flux:button wire:click="approve({{ $testimonial->id }})" icon="check" size="sm" variant="filled">Approve</flux:button>
                    <flux:button wire:click="feature({{ $testimonial->id }})" icon="star" size="sm" variant="filled">Feature</flux:button>
                </div>

                <flux:button wire:confirm="Are you sure you want to delete this testimony?\nThis action cannot be undone." wire:click="delete({{ $testimonial->id }})" icon="trash" size="sm" variant="subtle">Delete</flux:button>
            </div>
        </div>
    @empty
        <div class="text-center space-y-3 card">
            <flux:icon.ghost class="size-12 text-zinc-400/50 mx-auto" />
            <flux:text size="lg">This is where testimonials from your contacts will appear.</flux:text>
        </div>
    @endforelse

    <div>{{ $testimonials->links() }}</div>
</div>
