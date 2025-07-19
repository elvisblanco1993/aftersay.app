<div>
    <div x-data="{open: false}">
        <div class="w-full flex justify-center">
            <flux:button @click="open=true" icon-trailing="plus">Add step</flux:button>
        </div>

        <div x-cloak x-show="open" class="mt-3 px-4 py-6 border dark:border-zinc-700 rounded-xl">
            <form wire:submit="save">
                @csrf
                <div class="space-y-6">

                    <flux:select wire:model="action" label="What should happen at this step?">
                            <option value="">Select an action</option>
                        @forelse (\App\Enums\WorkflowActionType::cases() as $case)
                            <option value="{{ $case->value }}">{{ $case->label() }}</option>
                        @empty
                        @endforelse
                    </flux:select>
        
                    <flux:switch wire:model.live="delayed" label="Add a delay before this step?" align="left" />
        
                    @if ($delayed)
                        <div class="flex items-center gap-2">
                            <flux:text>Wait</flux:text>
                            <flux:input type="number" wire:model="delay" step="1"/>
                            <flux:select wire:model="delay_unit">
                                @forelse (\App\Enums\DelayUnit::cases() as $case)
                                    <option value="{{ $case->value }}">{{ $case->label() }}</option>
                                @empty
                                @endforelse
                            </flux:select>
                            <flux:text class="flex-none">before continuing</flux:text>
                        </div>
                    @endif
        
                    <flux:radio.group wire:model.live="content_type" label="How should we craft the message?" variant="segmented">
                        <flux:radio value="template" label="Template" />
                        <flux:radio value="custom" label="Custom" />
                    </flux:radio.group>
        
                    @if ($content_type === 'template')
                        <flux:select wire:model="template_id" label="Choose a template">
                                <option value="">Select from your saved templates</option>
                            @forelse (\App\Enums\DelayUnit::cases() as $case)
                                <option value="{{ $case->value }}">{{ $case->label() }}</option>
                            @empty
                            @endforelse
                        </flux:select>
                    @endif
        
                    @if ($content_type === 'custom')
                        <flux:textarea wire:model="custom_message" label="Write your custom message" placeholder="Type the message you want to send at this step..." />
                    @endif
        
                    <flux:button class="w-full" type="submit" variant="primary" color="blue">Save step</flux:button>
                </div>
            </form>
        </div>
    </div>
</div>

