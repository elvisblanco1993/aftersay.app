<div>
    <flux:modal.trigger name="edit-profile">
        <flux:button variant="primary">Send link</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-profile" class="md:w-96">
        <div class="space-y-6">
            <flux:heading size="lg">Add client</flux:heading>

            <flux:input label="Client Name" />
            <flux:input label="Contact Name" />
            <flux:input label="Contact Email" />
            <flux:input label="Contact Phone" />
            <flux:input label="Industry" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
