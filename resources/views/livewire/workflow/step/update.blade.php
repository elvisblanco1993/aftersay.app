<div>
    <flux:modal.trigger name="edit-step-{{ $step->id }}">
        <flux:button size="xs">Edit</flux:button>
    </flux:modal.trigger>

    <flux:modal :closable="false" name="edit-step-{{ $step->id }}" class="md:w-lg" variant="flyout">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add step</flux:heading>
            </div>

            <form wire:submit="save">
                @csrf
                <div class="space-y-6 max-w-lg mx-auto">

                    <flux:select wire:model="action" label="What should happen at this step?">
                            <option value="">Select an action</option>
                        @forelse (\App\Enums\WorkflowActionType::cases() as $case)
                            <option value="{{ $case->value }}">{{ $case->label() }}</option>
                        @empty
                        @endforelse
                    </flux:select>
        
                    @if ($step->order > 1)
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
                                <flux:text class="flex-none">before sending</flux:text>
                            </div>
                        @endif
                    @endif
        
                    <flux:radio.group wire:model.live="content_type" label="How should we craft the message?" variant="segmented">
                        <flux:radio value="template" label="Template" />
                        <flux:radio value="custom" label="Custom" />
                    </flux:radio.group>
        
                    @if ($content_type === 'template')
                        <flux:select wire:model="template_id" label="Choose a template">
                                <option value="">Select from your saved templates</option>
                            @forelse ($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                            @empty
                            @endforelse
                        </flux:select>
                    @endif
        
                    @if ($content_type === 'custom')
                        <flux:textarea wire:model="custom_message" label="Write your custom message" placeholder="Type the message you want to send at this step..." />
                    @endif
        
                    <flux:button class="w-full" type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>

