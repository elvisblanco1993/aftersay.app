<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Templates</flux:heading>
        <livewire:contact.create />
    </div>

    <div class="flex items-center justify-between">
        <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search..." class="max-w-xs" />
    </div>
</div>
