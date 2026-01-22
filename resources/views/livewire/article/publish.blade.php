<div class="flex items-center gap-3">
    <flux:select wire:model.live="status" placeholder="Choose status...">
        @foreach (\App\Enums\ArticleStatus::cases() as $option)
            <flux:select.option :value="$option">{{ $option->label() }}</flux:select.option>
        @endforeach
    </flux:select>
</div>
