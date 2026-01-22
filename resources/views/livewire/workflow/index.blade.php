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
        <flux:card size="sm" :wire:key="'workflow-'.$workflow->id">
            <div class="sm:flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3">
                        <flux:heading size="lg">{{ $workflow->name }}</flux:heading>
                        <flux:badge variant="pill" :color="$workflow->is_active->color()" size="sm">{{ $workflow->is_active->label() }}</flux:badge>
                    </div>

                    <div class="mt-3 grid grid-cols-3 justify-even">
                        <div class="grid-cols-3 sm:col-span-1 space-y-1">
                            <span class="text-xs text-zinc-500 dark:text-white/70">Steps</span>
                            <div class="text-sm">{{ $workflow->steps_count }}</div>
                        </div>
                        <div class="grid-cols-3 sm:col-span-1 space-y-1">
                            <span class="text-xs text-zinc-500 dark:text-white/70">Contacts Using</span>
                            <div class="text-sm">{{ $workflow->contacts_count }}</div>
                        </div>
                        <div class="grid-cols-3 sm:col-span-1 space-y-1">
                            <span class="text-xs text-zinc-500 dark:text-white/70">Avg. Open Rate</span>
                            <div class="text-sm">
                                <flux:tooltip>
                                    {{ number_format(($workflow->logs_avg_open_count ?? 0) * 100, 1) }}%
                                </flux:tooltip>
                            </div>
                        </div>
                    </div>
                    @if ($workflow->steps_count > 0)
                        <flux:card size="sm" class="mt-3">
                            <span class="text-xs text-zinc-500 dark:text-white/70">WORKFLOW STEPS</span>

                            <div class="flex items-center gap-2">
                                @forelse ($workflow->steps->take(3) as $index => $step)
                                    <flux:badge size="sm">
                                        {{ $step->order }}.{{ $step?->template?->name }} @unless ($index === 0) ({{ $step->delay . $step->delay_unit[0] }}) @endunless
                                    </flux:badge>
                                @empty
                                @endforelse

                                @if ($workflow->steps_count > 3)
                                    <span class="text-xs">+{{ $workflow->steps_count - 3 }} more</span>
                                @endif
                            </div>
                        </flux:card>
                    @endif
                </div>
                <div class="sm:ml-6 mt-3 sm:mt-0 flex flex-col gap-2">
                    <flux:button :href="route('workflow.show', ['workflow' => $workflow])" wire:navigate >{{__('Edit')}}</flux:button>
                    @if ($workflow->is_active->toBool())
                        <livewire:workflow.duplicate :workflow="$workflow" :wire:key="'duplicate-'.$workflow->id"/>
                        {{-- <flux:button>Analytics</flux:button> --}}
                    @else
                        <livewire:workflow.delete :workflow="$workflow" :wire:key="'delete-'.$workflow->id" />
                    @endif
                </div>
            </div>
        </flux:card>
    @empty
    @endforelse

    <flux:pagination :paginator="$workflows" />
</div>
