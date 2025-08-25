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
            @endcan
        </div>
    </x-settings.layout>
</section>
