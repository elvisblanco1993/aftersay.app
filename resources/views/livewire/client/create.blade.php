<div>
    <flux:modal.trigger name="edit-profile">
        <flux:button variant="primary">Add client</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-profile" class="md:w-96">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <flux:heading size="lg">Add client</flux:heading>

                <flux:input wire:model="business_name" label="Business Name" />
                <flux:input wire:model="contact_name" label="Contact Name" />
                <flux:input wire:model="email" label="Contact Email" type="email" />
                <flux:input wire:model="phone" label="Contact Phone" type="tel" />
                <flux:input wire:model="website" label="Website" type="url" />
                <flux:select wire:model="industry" label="Industry">
                    <option value="">Select an option</option>
                    @forelse (config('internal.industries') as $opt)
                        <option value="">{{ $opt }}</option>
                    @empty
                    @endforelse
                </flux:select>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
