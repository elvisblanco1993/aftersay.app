<div>
    <flux:modal.trigger name="duplicate-workflow">
            <flux:button>Duplicate</flux:button>
    </flux:modal.trigger>

    <flux:modal name="duplicate-workflow" class="md:w-96" >
        <form wire:submit="duplicate">
            @csrf
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Duplicate Workflow</flux:heading>
                </div>

                <flux:input label="Name" placeholder="Client Feedback Flow" wire:model="name" autofocus />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Duplicate</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
