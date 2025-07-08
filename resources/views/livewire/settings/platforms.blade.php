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
        <flux:modal name="add-platform" class="md:w-96" variant="flyout">
            <div class="space-y-6">
                <flux:heading size="lg">Add a review platform</flux:heading>

                <flux:select label="Choose a platform">
                    <option value=""></option>
                </flux:select>

                <flux:input type="url" label="Review page URL" 
                    placeholder="e.g. https://www.google.com/..."
                    description="Paste the link to your business's review page on the selected platform"
                />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save platform</flux:button>
                </div>
            </div>
        </flux:modal>
    </x-settings.layout>
</section>
