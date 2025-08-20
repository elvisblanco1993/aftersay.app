<div>
    <form wire:submit="save">
        @csrf
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <flux:heading size="xl">{{ $template->name }}</flux:heading>
                    <flux:breadcrumbs>
                        <flux:breadcrumbs.item :href="route('template.index')" wire:navigate>Templates</flux:breadcrumbs.item>
                        <flux:breadcrumbs.item>{{ $template->name }}</flux:breadcrumbs.item>
                    </flux:breadcrumbs>
                </div>

                <div class="flex items-center gap-4">
                    <x-action-message on="saved" />
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>

            <flux:input wire:model="subject" label="Email subject" />

            <x-editor wire:model="body" />

            <div class="space-y-2">
                <flux:heading>Placeholders</flux:heading>
                <flux:text>Use these placeholders to dinamically insert content into your template.</flux:text>
            </div>

            <flux:separator />
            <flux:input wire:model="name" label="Template name" description="Used internally to help you easily locate the template." />
        </div>
    </form>
</div>
