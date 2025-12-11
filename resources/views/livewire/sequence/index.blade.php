<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Sequences</flux:heading>
            <flux:subheading>Track individual contact journeys through workflows</flux:subheading>
        </div>
        <flux:button icon:trailing="plus" variant="primary">Start New Sequence</flux:button>
    </div>

    <div class="flex items-center gap-4">
        <flux:input wire:model.live.debounce-250="query" icon="magnifying-glass" placeholder="Search contacts..." class="w-full sm:max-w-xs" />

        <flux:select wire:model.live="status_filter" class="max-w-36">
            <flux:select.option value="all" label="All Statuses" />
            @foreach (\App\Enums\SequenceStatus::cases() as $statusOpt)
                <flux:select.option :value="$statusOpt->value" :label="$statusOpt->label()" />
            @endforeach
        </flux:select>
        <flux:select wire:model.live="workflow_filter" class="max-w-64">
            <flux:select.option value="" label="All Workflows" />
            @foreach ($workflows as $opt)
                <flux:select.option :value="$opt->id" :label="$opt->name" />
            @endforeach
        </flux:select>
    </div>

    @forelse ($sequences as $sequence)
        <flux:card size="sm">
            <div class="flex items-center gap-3">
                <flux:avatar circle :name="$sequence->contact->full_name" color="auto" />
                <div>
                    <flux:heading size="lg">{{ $sequence->contact->full_name }}</flux:heading>
                    <flux:text>{{ $sequence->contact->email }}</flux:text>
                </div>
            </div>
            <div class="mt-3 flex items-start gap-6">
                <div class="space-y-2">
                    <flux:text>Workflow</flux:text>
                    <flux:heading>{{ $sequence->workflow->name }}</flux:heading>
                </div>
                <div class="space-y-1">
                    <flux:text>Status</flux:text>
                    <flux:badge size="sm" :color="$sequence->status->color()">{{ $sequence->status->label() }}</flux:badge>
                </div>
                <div class="space-y-2">
                    <flux:text>Progress</flux:text>
                    <flux:heading>Step {{ $sequence->logs_count }} out of {{ $sequence->workflow_steps_count }}</flux:heading>
                </div>
                <div class="space-y-2">
                    <flux:text>{{ $sequence->status->is(\App\Enums\SequenceStatus::Completed) ? __('Completed') : __('Started') }}</flux:text>
                    <flux:heading>{{ $sequence->status->timestamp($sequence)?->diffForHumans() }}</flux:heading>
                </div>
            </div>

            @if (!$sequence->status->is(\App\Enums\SequenceStatus::Queued))
                <div class="mt-3">
                    @php
                        $percent_completed = $sequence->logs_count / $sequence->workflow_steps_count * 100;
                    @endphp
                    <flux:text class="text-xs">{{ $percent_completed }}% complete</flux:text>
                    <div class="mt-1 w-full bg-gray-200 dark:bg-zinc-700 rounded-full h-2 overflow-hidden">
                        <div @class([
                            'h-full rounded-full transition-all duration-300',
                            'bg-zinc-900 dark:bg-accent' => $percent_completed < 100,
                            'bg-emerald-500' => $percent_completed === 100
                        ]) style="width: {{ $percent_completed }}%;"></div>
                    </div>
                </div>

                @if ($sequence->status->is(\App\Enums\SequenceStatus::Running))
                    @php
                        $log = $sequence->logs()->latest()->first();
                    @endphp
                    <flux:callout class="mt-3">
                        <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <flux:text>Current Step</flux:text>
                                <flux:heading>{{ $log?->workflowStep?->template?->name }}</flux:heading>
                                <flux:text>Sent {{ $log?->created_at?->diffForHumans() }}</flux:text>
                            </div>
                            <div class="space-y-1 text-right">
                                <flux:text>Next Step</flux:text>
                                <flux:heading>In {{ $sequence->next_run_at->diffForHumans(['syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE,]) }}</flux:heading>
                            </div>
                        </div>
                    </flux:callout>
                @endif

                @if ($percent_completed === 100)
                    <flux:callout class="mt-3 text-black!" color="emerald">
                        <flux:text variant="strong">
                            <span>Sequence completed successfully</span>
                            <span class="font-black">&middot;</span>
                            <span>Took {{ $sequence->created_at->diffForHumans(['syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE,]) }}</span>
                            <span class="font-black">&middot;</span>
                            <span>{{ $sequence->logs->count() }} emails sent</span>
                        </flux:text>
                    </flux:callout>
                @endif
            @endif
        </flux:card>
    @empty
        
    @endforelse

    <div>{{ $sequences->links() }}</div>

    {{-- Sequence Selector --}}
    <livewire:contact.start-sequence />
</div>
