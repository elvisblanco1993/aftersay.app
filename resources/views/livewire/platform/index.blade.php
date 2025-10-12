<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Platforms')" :subheading="__(' Manage the platforms where you collect client reviews.')">
        <div class="space-y-6">
            <div class="space-y-3">
                @forelse ($platforms as $platform)
                    <div class="minicard flex items-center justify-between">
                        <div class="capitalize text-sm">{{ $platform->name }}</div>
                        <livewire:platform.delete :platform="$platform" />
                    </div>
                @empty
                    <flux:callout color="yellow" icon="information-circle" heading="No review platforms connected yet" text="Connect a platform like Google or Yelp to start collecting public reviews from your clients."></flux:callout>
                @endforelse
            </div>
            @can('create', \App\Models\Platform::class)
                <livewire:platform.add />
            @else
                <flux:callout icon="information-circle" variant="secondary" inline>
                    <flux:callout.heading>You’re growing fast! You’ve reached your platform link limit.</flux:callout.heading>
                    <flux:callout.text>Upgrade your plan to keep adding more links.</flux:callout.text>
                    <x-slot name="actions">
                        <flux:button size="sm" :href="route('billing.plans')" icon-trailing="external-link">Upgrade plan</flux:button>
                    </x-slot></flux:callout>
            @endcan
        </div>
    </x-settings.layout>
</section>
