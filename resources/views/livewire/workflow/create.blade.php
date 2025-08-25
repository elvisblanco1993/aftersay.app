<div>
    <flux:modal.trigger name="create-workflow">
            <flux:button variant="primary" icon-trailing="plus">New</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-workflow" class="md:w-96">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Create Workflow</flux:heading>
                </div>

                <flux:input label="Name" placeholder="Client Feedback Flow" wire:model="name" autofocus />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Create</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
