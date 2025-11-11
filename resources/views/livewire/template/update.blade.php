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

                <ul class="border dark:border-white/20 rounded-lg text-sm">
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[first_name]</span>
                        <span>The contact's First Name</span>
                    </li>
                    <flux:separator />
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[last_name]</span>
                        <span>The contact's Last Name</span>
                    </li>
                    <flux:separator />
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[email]</span>
                        <span>The contact's Email Address</span>
                    </li>
                    <flux:separator />
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[phone]</span>
                        <span>The contact's Phone Number</span>
                    </li>
                    <flux:separator />
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[company_name]</span>
                        <span>The name of your company</span>
                    </li>
                    <flux:separator />
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[business_type]</span>
                        <span>Your business industry</span>
                    </li>
                    <flux:separator />
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[feedback_url]</span>
                        <span>The link to the reviews collection page</span>
                    </li>
                    <flux:separator />
                    <li class="grid grid-cols-2 gap-8 px-4 py-2">
                        <span>[testimonial_url]</span>
                        <span>The link to the testimonials collection page</span>
                    </li>
                </ul>
            </div>

            <flux:separator text="Template Settings" />
            <flux:input wire:model="name" label="Template name" description="Used internally to help you easily locate the template." />
            <flux:callout>
                <flux:switch align="left" label="Enable template" wire:model.live="is_enabled" description="Toggle to use the template in workflows." />
            </flux:callout>
            
            <livewire:template.delete :template="$template" />
        </div>
    </form>
</div>
