<div>
    <flux:modal.trigger name="update-contact">
        <flux:button icon="user-pen" size="sm" />
    </flux:modal.trigger>

    <flux:modal name="update-contact" class="md:w-96">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <flux:heading size="lg">Update contact</flux:heading>

                <div class="grid sm:grid-cols-2 gap-6">
                    <flux:input wire:model="first_name" label="First name" autofocus />
                    <flux:input wire:model="last_name" label="Last name" />
                </div>
                <flux:input wire:model="email" label="Email address" type="email" />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
