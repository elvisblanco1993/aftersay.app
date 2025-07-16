<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Page Setup')" :subheading="__('Manage your public-facing reviews page.')">
        <x-slot name="actions">
            <flux:modal.trigger name="edit-profile">
                <flux:button icon="settings" size="sm" />
            </flux:modal.trigger>

            <flux:modal name="edit-profile" class="md:w-96" variant="flyout">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Update profile</flux:heading>
                        <flux:text class="mt-2">Make changes to your personal details.</flux:text>
                    </div>

                    <flux:input label="Name" placeholder="Your name" />

                    <flux:input label="Date of birth" type="date" />

                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                    </div>
                </div>
            </flux:modal>
        </x-slot>




        <livewire:page.show :slug="$tenant->page->slug" />
    </x-settings.layout>
</section>
