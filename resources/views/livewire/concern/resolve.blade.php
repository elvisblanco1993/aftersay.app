<div>
    @unless ($concern->status === \App\Enums\ConcernStatus::Resolved)
        <flux:modal.trigger name="resolve-modal">
            <flux:button variant="primary" icon-trailing="check">Resolve</flux:button>
        </flux:modal.trigger>
        <flux:modal name="resolve-modal" class="md:w-128">
            <form wire:submit="save">
                @csrf
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Resolution Details</flux:heading>
                        <flux:text class="mt-2">Please provide details on how you resolved this concern.</flux:text>
                    </div>

                    <flux:textarea wire:model="message" rows="4" />

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" icon-trailing="check">Submit resolution</flux:button>
                    </div>
                </div>
            </form>
        </flux:modal>
    @else
        <flux:badge :color="$concern->status->color()" variant="pill">{{ $concern->status->label() }}</flux:badge>
    @endunless
</div>
