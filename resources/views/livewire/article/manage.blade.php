<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div class="w-1/2">
            <flux:input placeholder="Article Title" wire:model="title" />
            {{--  --}}
        </div>

        <div class="flex items-center gap-3">
            <livewire:article.publish :article="$article" />
            <flux:button wire:click="save">Save</flux:button>
        </div>
    </div>

    <div class="space-y-2">
        <flux:editor wire:model="content" placeholder="Write something awesome" />
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
