<div>
    <flux:modal.trigger name="start-sequence">
        <flux:button icon:trailing="plus" variant="primary">Start New Sequence</flux:button>
    </flux:modal.trigger>

    <flux:modal name="start-sequence" variant="floating" flyout class="w-full md:w-96">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Start New Sequence</flux:heading>
                </div>
    
                <flux:select wire:model.live="workflow_id" label="Select Workflow">
                    <flux:select.option value="" label="Pick a workflow..."/>
                    @forelse ($workflows as $workflow)
                        <flux:select.option :value="$workflow->id" :label="$workflow->name" wire:key="{{ $workflow->id }}"/>
                    @empty
                    @endforelse
                </flux:select>
    
                <flux:field>
                    <flux:label>Select Contacts</flux:label>
    
                    <flux:input type="search" wire:model.live="contact_query" placeholder="Search contacts..." />
    
                    <flux:checkbox.group wire:model.live="selected_contacts" variant="cards" class="flex-col space-y-0!" :disabled="!$this->workflow_id">
                        @forelse ($contacts as $contact)
                            <flux:checkbox :value="$contact->id" :label="$contact->full_name" :description="$contact->email" wire:key="{{ $contact->id }}"/>
                        @empty
                        @endforelse
                    </flux:checkbox.group>
                    <flux:error name="selected_contacts" />
                </flux:field>
    
                <div class="flex">
                    <flux:spacer />
    
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
