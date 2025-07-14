<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Platforms')" :subheading="__(' Manage the platforms where you collect client reviews.')">
        <div class="my-6 w-full space-y-6">
            @if ($platforms->count() > 0)
                <div class="flex items-center justify-between">
                    <flux:heading>Active platforms</flux:heading>
                    @can('create', \App\Models\Platform::class)
                        <livewire:platform.add />
                    @endcan
                </div>
            @endif
            <div class="space-y-1">
                @forelse ($platforms as $platform)
                    @if (!$loop->first)
                        <flux:separator />
                    @endif
                    <livewire:platform.show :platform="$platform" />
                @empty
                    <flux:callout color="violet" icon="information-circle" heading="No review platforms connected yet" text="Connect a platform like Google or Yelp to start collecting public reviews from your clients."></flux:callout>
                @endforelse
            </div>
        </div>
    </x-settings.layout>
</section>
