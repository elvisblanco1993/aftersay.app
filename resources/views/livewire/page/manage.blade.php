<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Page Setup')" :subheading="__('Manage your public-facing reviews page.')">
        <x-slot name="actions">
            <div class="flex items-center gap-3">
                <flux:input size="sm" wire:model="url" copyable />
                <flux:modal.trigger name="edit-profile">
                    <flux:button icon="settings" size="sm" />
                </flux:modal.trigger>
            </div>

            <flux:modal name="edit-profile" class="md:w-128" variant="flyout">
                <form wire:submit="save">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <flux:heading size="lg">Update page</flux:heading>
                        </div>

                        <flux:input label="Heading" wire:model="heading" />
                        <flux:textarea label="Subheading" wire:model="subheading" rows="2" />

                        <div class="flex">
                            <flux:spacer />

                            <flux:button type="submit" variant="primary">Save changes</flux:button>
                        </div>
                    </div>
                </form>
            </flux:modal>
        </x-slot>

        <x-slot name="container">
            <livewire:page.show :slug="$tenant->page->slug" />
        </x-slot>
    </x-settings.layout>
</section>
