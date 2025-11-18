<div>
    <flux:modal name="start-sequence" class="md:w-96" variant="flyout">
        <form wire:submit="save">
            @csrf
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Start Sequence</flux:heading>
                    <flux:text class="mt-2">For: {{ $contact?->full_name ?? '' }}</flux:text>
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

                    <flux:button type="submit" variant="primary" icon="rocket">Launch Sequence</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
