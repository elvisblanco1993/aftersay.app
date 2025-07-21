<div class="space-y-3" x-data="{ dragging: false }">
    <div wire:sortable="updateStepOrder" wire:sortable.options="{ animation: 150, onStart: function () { dragging = true }, onEnd: function () { dragging = false } }">
        @forelse ($steps as $step)
            @unless ($loop->index === 0)
                <div class="text-center space-y-3" x-show="!dragging">
                    <flux:icon.move-down class="mx-auto text-zinc-500" />
                    <flux:badge size="sm" variant="pill">Wait {{ $step->delay }} {{ $step->delay_unit }}</flux:badge>
                    <flux:icon.move-down class="mx-auto text-zinc-500" />
                </div>
            @endunless

            <div class="border border-zinc-400/50 rounded-xl p-4" wire:sortable.item="{{ $step->id }}" wire:key="step-{{ $step->id }}">
                <div class="flex justify-between">
                    <div>
                        <h3 class="text-zinc-800 dark:text-white font-semibold text-base">{{ $step->action->label() }}</h3>
                    </div>
                    <div wire:sortable.handle class=" cursor-grab">
                        <flux:icon.grip-vertical variant="mini" />
                    </div>
                </div>
                <div class="mt-2 text-sm text-zinc-700 dark:text-zinc-100">
                    @if ($step->template_id)
                        <div>Template: <span class="font-medium text-zinc-900 dark:text-zinc-50">Welcome Email</span></div>
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

                <div class="mt-3 flex items-center gap-3">
                    <livewire:workflow.step.update :step="$step" wire:key="update-{{ $loop->index }}" />
                    <livewire:workflow.step.delete :step="$step" wire:key="delete-{{ $loop->index }}" />
                </div>

            </div>

        @empty
            <flux:callout color="violet">
                <flux:callout.heading icon="lightbulb">{{ __("Let’s get this workflow moving!") }}</flux:callout.heading>
                <flux:callout.text>{{ __("This workflow doesn’t have any steps yet. Start by adding an action — like sending an email, scheduling a text, or waiting a few days. You’re in control of how things flow.") }}</flux:callout.text>
            </flux:callout>
        @endforelse
    </div>
</div>
