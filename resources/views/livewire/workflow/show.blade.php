<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">{{ $workflow->name }}</flux:heading>
            <flux:breadcrumbs>
                <flux:breadcrumbs.item :href="route('workflow.index')" separator="slash">Workflows</flux:breadcrumbs.item>
                <flux:breadcrumbs.item separator="slash">{{ $workflow->name }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <livewire:workflow.update :workflow="$workflow" />
    </div>

    <div class="max-w-2xl mx-auto space-y-6">
        <livewire:workflow.step.index :workflow="$workflow"/>
        <livewire:workflow.step.create :workflow="$workflow" />
    </div>
</div>
