<div>
    <flux:modal name="start-campaign" class="md:w-96">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Start Campaign</flux:heading>
                    <flux:text class="mt-2">For: {{ $contact?->name ?? '' }}</flux:text>
                </div>

                <flux:select wire:model="workflow_id" :label="__('Select Workflow')">
                    <option value="">Pick an option</option>
                    @forelse ($workflows as $workflow)
                        <option value="{{ $workflow->id }}">{{ $workflow->name }}</option>
                    @empty
                    @endforelse
                </flux:select>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary" icon="rocket">Launch Campaign</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
