<div class="space-y-6">
    <div class="flex items-center justify-between">
        <flux:heading size="xl">{{ $workflow->name }}</flux:heading>
        <livewire:workflow.update :workflow="$workflow" />
    </div>

    <div class="max-w-2xl mx-auto space-y-6">
        <livewire:workflow.step.index :workflow="$workflow"/>
        <livewire:workflow.step.create :workflow="$workflow" />
    </div>
</div>
