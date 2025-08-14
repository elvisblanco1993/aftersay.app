<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">{{ $template->name }}</flux:heading>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item :href="route('template.index')" wire:navigate>Templates</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>{{ $template->name }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>
    
    <form wire:submit="save">
        @csrf
        <div class="space-y-6">
            <flux:input wire:model="subject" label="Email subject" />

            <x-editor wire:model.live.debounce.1s="body" />
            
            <x-action-message on="saved" />
        </div>
    </form>
</div>
