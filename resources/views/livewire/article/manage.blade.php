<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">{{ $article?->title }}</flux:heading>
            {{--  --}}
        </div>

        <div class="flex items-center gap-3">
            <flux:button>Save draft</flux:button>
            @if ($article->published_at)
                <flux:button>Settings</flux:button>
            @else
                <flux:button>Publish</flux:button>
            @endif
        </div>
    </div>

    <div class="space-y-2">
        <flux:editor wire:model="content" label="Content" />
        <flux:text size="sm">{{ strlen($content) }} characters</flux:text>
    </div>
    <flux:separator />
    <div class="space-y-2">
        <flux:textarea wire:model="excerpt" label="Excerpt" />
        <flux:text size="sm">{{ strlen($excerpt) }} characters</flux:text>
    </div>
    <flux:separator />
    <flux:textarea wire:model="keywords" label="Keywords" rows="2" />

</div>
