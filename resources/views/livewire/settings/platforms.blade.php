<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Platforms')" :subheading="__(' Manage the platforms where you collect client reviews.')">
        <div class="my-6 w-full space-y-6">
            @if ($platforms->count() > 0)
                <div class="flex items-center justify-between">
                    <flux:heading>Active platforms</flux:heading>
                    <flux:modal.trigger name="add-platform">
                        <flux:button size="sm" variant="primary" icon="plus" />
                    </flux:modal.trigger>
                </div>
            @endif
            @forelse ($platforms as $platform)
                <div>{{ $platform->name }}</div>
            @empty
                <flux:callout color="violet" icon="information-circle" heading="No review platforms connected yet" text="Connect a platform like Google or Yelp to start collecting public reviews from your clients.">
                    <x-slot name="actions">
                        <flux:modal.trigger name="add-platform">
                            <flux:button size="sm" variant="primary" icon="link">Connect your first platform</flux:button>
                        </flux:modal.trigger>
                    </x-slot>
                </flux:callout>
            @endforelse
        </div>

        {{-- Add Platform Modal --}}
        <flux:modal name="add-platform" class="md:w-xl" :dismissible="false">
            <form wire:submit="savePlatform">
                @csrf
                <div class="space-y-6">
                    <flux:heading size="lg">Add a review platform</flux:heading>

                    <flux:input.group>
                        <flux:select wire:model.live="provider" class="max-w-fit">
                            <flux:select.option selected value=''>Select platform</flux:select.option>
                            <flux:select.option value="google">Google</flux:select.option>
                        </flux:select>
                        <flux:input wire:model.live.debounce.500="business_search" placeholder="Codewize LLC, Pembroke Pines..." />
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
    </x-settings.layout>
</section>
