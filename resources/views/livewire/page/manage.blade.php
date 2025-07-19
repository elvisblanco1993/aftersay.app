<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Page Setup')" :subheading="__('Manage your public-facing reviews page.')">
        <x-slot name="actions">
            <div class="flex items-center gap-3">
                <flux:input size="sm" wire:model="url" copyable />
                <div class="flex-none">
                    <flux:modal.trigger name="edit-profile">
                        <flux:button icon="settings" size="sm" />
                    </flux:modal.trigger>
                </div>
            </div>

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
                            <img src="{{ $logo->temporaryUrl() }}" class="h-8 w-auto max-w-full" alt="Temporary Logo">
                        @elseif ($page->logo)
                            <img src="{{ $page->logo_url }}" class="h-8 w-auto max-w-full" alt="Page Logo">
                        @endif

                        <div class="flex items-center gap-3">
                            <flux:spacer />
                            <x-action-message on="saved-page" >Saved...</x-action-message>
                            <flux:button type="submit" variant="primary">Save changes</flux:button>
                        </div>
                    </div>
                </form>
            </flux:modal>
        </x-slot>

        {{-- Placeholder Design --}}
        <x-slot name="container">
            <div class="mt-12 space-y-6 text-center">
                <div>
                    <img src="{{ $page->logo_url }}" alt="{{ $page->tenant->name }} logo" class="h-12 w-auto mx-auto">
                </div>
    
                <div class="w-full min-w-xl max-w-xl mx-auto space-y-6 rounded-2xl bg-white dark:bg-zinc-700/80 p-6 drop-shadow-xl">
                    <div>
                        <flux:heading level="1" size="xl">{{ $page->heading }}</flux:heading>
                        <flux:text size="lg" class="mt-2">{{ $page->subheading }}</flux:text>
                    </div>
    
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
        </x-slot>
        {{-- Placeholder Design - End --}}
    </x-settings.layout>
</section>
