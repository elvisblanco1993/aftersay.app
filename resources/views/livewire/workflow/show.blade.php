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

    @if ($workflow->instances()->where('status', 'running')->count() > 0)
        <flux:callout color="yellow" icon="information-circle">
            <flux:callout.heading>This workflow is locked</flux:callout.heading>
            <flux:callout.text>This workflow is currently part of an active campaign and can’t be edited right now. To make changes, please wait until the campaign is complete or duplicate the workflow to create a new version.</flux:callout.text>
        </flux:callout>
    @endif

    <div class="space-y-6">
        <livewire:workflow.step.index :workflow="$workflow"/>
        <livewire:workflow.step.create :workflow="$workflow" />
    </div>
</div>
