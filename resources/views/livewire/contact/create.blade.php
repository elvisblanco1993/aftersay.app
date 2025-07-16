<div>
    <flux:modal.trigger name="add-contact">
        <flux:button variant="primary">Add contact</flux:button>
    </flux:modal.trigger>

    <flux:modal name="add-contact" class="md:w-96">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <flux:heading size="lg">New contact</flux:heading>

                <flux:input wire:model="name" label="Full name" />
                <flux:input wire:model="email" label="Email address" type="email" />
                <flux:input wire:model="phone" label="Phone number" type="tel" />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
