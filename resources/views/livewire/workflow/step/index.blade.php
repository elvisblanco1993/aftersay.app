<div>
    <div class="space-y-6" wire:sortable="updateStepOrder" wire:sortable.options="{ animation: 150, onStart: function () { dragging = true }, onEnd: function () { dragging = false } }">
        @forelse ($steps as $step)
            <flux:card wire:sortable.item="{{ $step->id }}" wire:key="step-{{ $step->id }}">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="size-6 aspect-square bg-zinc-400/15 dark:bg-zinc-400/40 text-zinc-700 dark:text-zinc-200 rounded-full flex items-center justify-center">
                                <span class="text-sm">{{ $step->order }}</span>
                            </div>
                            <flux:badge size="sm" :icon="$step->action->icon()">{{ $step->action->label() }}</flux:badge>
                            @unless ($loop->index === 0)
                                <flux:badge size="sm" icon="calendar-sync">After {{ $step->delay }} {{ $step->delay_unit }}</flux:badge>
                            @endunless
                        </div>
                        <div class="mt-2 text-sm text-zinc-700 dark:text-zinc-100">
                            @if ($step->template_id)
                                <span class="font-medium text-zinc-900 dark:text-zinc-50">{{ $step->template->name }}</span>
                                <div class="italic text-zinc-600 dark:text-zinc-400 mt-1">
                                    {{ Str::of($step->template->body)->limit(100, '...') }}
                                </div>
                            @else
                                <div>Custom text:</div>
                                <div class="italic text-zinc-600 dark:text-zinc-400 mt-1">
                                    {{ Str::of($step->custom_message)->limit(100, '...') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    @unless ($readonly)
                        <div class="space-y-1 text-right">
                            <flux:button wire:sortable.handle size="xs" icon="grip-vertical" />
                            <livewire:workflow.step.update :step="$step" wire:key="update-{{ $step->id }}" />
                            <livewire:workflow.step.delete :step="$step" wire:key="delete-{{ $step->id }}" />
                        </div>
                    @endunless
                </div>
            </flux:card>

        @empty
            <flux:callout color="violet">
                <flux:callout.heading icon="lightbulb">{{ __("Let’s get this workflow moving!") }}</flux:callout.heading>
                <flux:callout.text>{{ __("This workflow doesn’t have any steps yet. Start by adding an action — like sending an email, scheduling a text, or waiting a few days. You’re in control of how things flow.") }}</flux:callout.text>
            </flux:callout>
        @endforelse
    </div>
</div>
