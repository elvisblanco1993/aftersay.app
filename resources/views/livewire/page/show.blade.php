<div>
    <main class=" flex flex-col items-center justify-between text-center px-6 py-16 space-y-6">

        <div class="space-y-6">
            <div>
                <img src="{{ asset('logo.webp') }}" alt="{{ $page->tenant->name }} logo" class="dark:hidden h-12 w-auto mx-auto">
                <img src="{{ asset('logo-dark.webp') }}" alt="{{ $page->tenant->name }} logo" class="hidden dark:block h-12 w-auto mx-auto">
            </div>

            <div class="w-full min-w-xl max-w-xl space-y-6 rounded-2xl bg-white dark:bg-zinc-700/80 p-6 shadow-lg">
                <div>
                    <flux:heading level="1" size="xl">{{ $page->heading }}</flux:heading>
                    <flux:text size="lg" class="mt-2">{{ $page->subheading }}</flux:text>
                </div>

                <div>
                    <flux:select wire:model.live="rating" :label="__('How was your experience?')">
                        <option value="">Select an option</option>
                        @foreach (\App\Enums\ExperienceRating::cases() as $opt)
                            <option value="{{ $opt->value }}">{{ $opt->label() }}</option>
                        @endforeach
                    </flux:select>
                </div>
                @if ($rating && $rating <=2)
                    <div class="text-left" wire:transition>
                        <flux:heading level="2" size="lg" class="text-red-600">We’re sorry to hear that.</flux:heading>
                        <flux:text class="mt-2">Your feedback helps us improve. Please tell us what went wrong, and we’ll do our best to make it right.</flux:text>
        
                        <form class="mt-4 space-y-4" wire:submit="saveInternalReview">
                            @csrf
                            <flux:textarea placeholder="What could we have done better?" />
                            <flux:input type="email" placeholder="Your email (optional)" />
                            <flux:button type="submit" class="w-full" variant="danger">Submit Feedback</flux:button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <div class="">Powered by <a href="{{ route('home') }}?ref=tenant_code_here" class="underline">AfterSay</a></div>
    </main>
</div>
