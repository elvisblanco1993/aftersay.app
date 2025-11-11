<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Page Setup')" :subheading="__('Manage your public-facing reviews page.')">

        <div class="space-y-6">
            <div class="flex items-center gap-3">
                <flux:input wire:model="review_url" readonly copyable />
                <div class="flex-none">
                    <flux:modal.trigger name="edit-profile">
                        <flux:button icon="settings" size="sm" />
                    </flux:modal.trigger>
                </div>
            </div>

            {{-- Placeholder Design --}}
            <div class="text-center space-y-6">
                <div>
                    @if ($page->logo_url)
                        <img src="{{ $page->logo_url }}" alt="{{ $page->tenant->name }} logo" class="h-12 w-auto mx-auto">
                    @endif
                </div>

                <div>
                    <flux:heading level="1" size="xl">{{ $page->heading }}</flux:heading>
                    <flux:text size="lg" class="mt-2">{{ $page->subheading }}</flux:text>
                </div>

                <div class="card">
                    <div>
                        <flux:select :label="__('How was your experience?')">
                            <option value="">Select an option</option>
                            @foreach (\App\Enums\ExperienceRating::cases() as $opt)
                                <option value="{{ $opt->value }}">{{ $opt->label() }}</option>
                            @endforeach
                        </flux:select>
                    </div>
                </div>
            </div>

            <flux:separator />

            <flux:input wire:model="testimonial_url" label="Testimonial Page URL" readonly copyable />
        </div>

        {{-- Review Page Update Modal --}}
        <flux:modal name="edit-profile" class="md:w-128" variant="flyout">
            <form wire:submit="save">
                @csrf
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Update page</flux:heading>
                    </div>

                    <flux:input label="Heading" wire:model="heading" />
                    <flux:textarea label="Subheading" wire:model="subheading" rows="2" />

                    <flux:input type="file" label="Logo" wire:model.live="logo" accept="image/*" />

                    @if ($logo)
                        <img src="{{ $logo->temporaryUrl() }}" class="h-16 w-auto max-w-full" alt="Temporary Logo">
                    @elseif ($page->logo)
                        <img src="{{ $page->logo_url }}" class="h-16 w-auto max-w-full" alt="Page Logo">
                    @endif

                    <div class="flex items-center gap-3">
                        <flux:spacer />
                        <x-action-message on="saved-page" >Saved...</x-action-message>
                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                    </div>
                </div>
            </form>
        </flux:modal>
    </x-settings.layout>
</section>
