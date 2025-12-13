<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Workflows</flux:heading>
            <flux:subheading>Manage workflow templates</flux:subheading>
        </div>
        <livewire:workflow.create />
    </div>

    <div class="flex items-center gap-4">
        <flux:input wire:model.live.debounce.250="query" icon="magnifying-glass" placeholder="Search workflows..." class="w-full sm:max-w-xs" />
        <flux:select wire:model.live="status_filter" class="max-w-36">
            <flux:select.option value="" label="All Statuses" />
            <flux:select.option value="active" label="Active" />
            <flux:select.option value="draft" label="Draft" />
        </flux:select>
    </div>

    @forelse ($workflows as $workflow)
        <flux:card size="sm">
            <div class="sm:flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3">
                        <flux:badge :color="$workflow->is_active->color()" size="sm">{{ $workflow->is_active->label() }}</flux:badge>
                        <flux:heading size="lg">{{ $workflow->name }}</flux:heading>
                    </div>

                    <div class="mt-3 grid grid-cols-4 justify-even">
                        <div class="grid-cols-4 sm:col-span-2 md:col-span-1 space-y-1">
                            <flux:text>Steps</flux:text>
                            <flux:heading>{{ $workflow->steps_count }}</flux:heading>
                        </div>
                        <div class="grid-cols-4 sm:col-span-2 md:col-span-1 space-y-1">
                            <flux:text>Contacts Using</flux:text>
                            <flux:heading>{{ $workflow->contacts_count }}</flux:heading>
                        </div>
                        <div class="grid-cols-4 sm:col-span-2 md:col-span-1 space-y-1">
                            <flux:text>Avg. Open Rate</flux:text>
                            <flux:heading></flux:heading>
                        </div>
                        <div class="grid-cols-4 sm:col-span-2 md:col-span-1 space-y-1">
                            <flux:text>Avg Completion</flux:text>
                            <flux:heading></flux:heading>
                        </div>
                    </div>
                </div>
                <div class="sm:ml-6 mt-3 sm:mt-0 flex flex-col gap-2"></div>
            </div>
        </flux:card>
    @empty
    @endforelse

    <flux:pagination :paginator="$workflows" />
</div>
