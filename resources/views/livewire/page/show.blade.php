<div>
    <main class="flex flex-col items-center justify-between text-center px-6 py-16 space-y-6">
        <div class="space-y-6">
            <div>
                <img src="{{ $page->logo_url }}" alt="{{ $page->tenant->name }} logo" class="h-12 w-auto mx-auto">
            </div>

            <div class="w-full md:min-w-xl md:max-w-xl space-y-6 rounded-2xl bg-white dark:bg-zinc-700/80 p-6 drop-shadow-xl">
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
                    <div class="text-left">
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

                @if ($rating && $rating > 2)
                    <div class="text-left">
                        <flux:heading level="2" size="lg" class="text-green-600">We're glad you had a great experience!</flux:heading>
                        <flux:text class="mt-2">Would you mind leaving us a public review on one of the following platforms?</flux:text>
                    </div>

                    <div @class(["grid grid-cols-1 gap-4", "sm:grid-cols-2" => $links->count() > 1])>
                        @forelse ($links as $link)
                            <a href="" target="_blank" class="block bg-white dark:bg-zinc-800 border dark:border-zinc-600/50 rounded-lg p-4 hover:shadow-md text-center">
                                <x-simpleicon-google class="size-8 fill-[#4285F4] mx-auto" />
                                <span class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Review us on Google</span>
                            </a>
                        @empty
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
        <div class="text-sm text-zinc-500 dark:text-zinc-400">Powered by <a href="{{ route('home') }}?ref={{ $page->slug }}" class="underline">AfterSay</a></div>
    </main>
</div>
