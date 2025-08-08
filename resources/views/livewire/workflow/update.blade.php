<div>
    <flux:modal.trigger name="update-workflow">
        <flux:button icon="settings" size="sm"/>
    </flux:modal.trigger>

    <flux:modal name="update-workflow" class="md:w-96" variant="flyout">
        <div class="space-y-6">
            <form wire:submit="save">
                @csrf
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Workflow properties</flux:heading>
                    </div>

                    <flux:input label="Name" placeholder="Client Feedback Flow" wire:model="name" />

                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                    </div>
                </div>
            </form>

            <flux:separator />
            <livewire:workflow.delete :workflow="$workflow" />
        </div>
    </flux:modal>
</div>
