<div>
    <flux:modal.trigger name="add-platform">
        <flux:button size="sm" variant="primary" icon="plus" />
    </flux:modal.trigger>
    <flux:modal name="add-platform" class="md:w-xl" :dismissible="false">   
        <form wire:submit="savePlatform">
            @csrf
            <div class="space-y-6">
                <flux:heading size="lg">Add a review platform</flux:heading>

                <flux:input.group>
                    <flux:select wire:model.live="provider" class="max-w-fit">
                        <flux:select.option selected value=''>Select platform</flux:select.option>
                        <flux:select.option value="google">Google</flux:select.option>
                        <flux:select.option value="yelp">Yelp</flux:select.option>
                    </flux:select>
                    @if ($provider === 'google')
                        <flux:input wire:model.live.debounce.500="business_search" placeholder="Search by business name..." />
                    @else
                        <flux:input wire:model="url" placeholder="Paste business review URL..." />
                    @endif
                </flux:input.group>
                
                <flux:radio.group wire:model.live="selected_place_id" class="max-h-72 overflow-auto">
                    @forelse ($business_results as $res)
                        <flux:radio :value="$res['id']" :label="$res['name']" :description="$res['address']" wire:key="result-{{ $loop->index }}" />
                    @empty
                    @endforelse
                </flux:radio.group>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save platform</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
