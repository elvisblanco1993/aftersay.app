<div>
    <flux:modal.trigger name="add-template">
        <flux:button variant="primary" icon-trailing="plus">New</flux:button>
    </flux:modal.trigger>

    <flux:modal name="add-template" class="md:w-96">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">New Template</flux:heading>
                </div>
    
                <flux:input wire:model="name" label="Name" />
    
                <div class="flex">
                    <flux:spacer />
    
                    <flux:button type="submit" variant="primary">Create</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
