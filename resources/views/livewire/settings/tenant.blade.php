<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Company Info')" :subheading="__('This is where you manage your business contact information.')">
        <form wire:submit="updateTenantInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" label="Business Name" type="text" autofocus autocomplete="business_name" />
            <flux:input wire:model="website" label="Website" type="url" autocomplete="website" />
            <flux:input wire:model="phone" label="Phone" type="tel" autocomplete="phone" />
            <flux:input wire:model="email" label="Email" type="email" autocomplete="email" />

            {{-- Address --}}
            <flux:select wire:model.live="country" label="Country">
                <option value="">Select an option</option>
                @forelse (config('internal.countries') as $opt)
                    <option :value="$opt">{{ $opt }}</option>
                @empty
                @endforelse
            </flux:select>

            @if ($country === 'United States')
                <flux:select wire:model="state" label="State">
                    <option value="">Select an option</option>
                    @forelse (config('internal.states') as $opt)
                        <option :value="$opt">{{ $opt }}</option>
                    @empty
                    @endforelse
                </flux:select>
            @else
                <flux:input wire:model="state" label="State/Region/Province" type="text" autocomplete="state" />
            @endif

            <flux:select wire:model="industry" label="Industry">
                <option value="">Select an option</option>
                @forelse (config('internal.industries') as $opt)
                    <option value="">{{ $opt }}</option>
                @empty
                @endforelse
            </flux:select>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="tenant-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>
