<div class="flex justify-end">
    <flux:button wire:click="save" :icon="$is_paused ? 'play' : 'pause'">
        @if ($is_paused) Resume @else Pause @endif
    </flux:button>
</div>
