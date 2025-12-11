<main class="flex flex-col items-center justify-between text-center px-6 py-16 space-y-6">
    <div class="space-y-6">
        <div>
            @if ($page->logo_url)
                <img src="{{ $page->logo_url }}" alt="{{ $page->tenant->name }} logo" class="h-24 w-auto mx-auto">
            @endif
        </div>

        <div class="text-center">
            <flux:heading level="1" size="xl">{{ $page->heading }}</flux:heading>
            <flux:text size="lg" class="mt-2">{{ $page->subheading }}</flux:text>
        </div>

        <flux:card>

            @unless ($rating)
            <div>
                <flux:text>Tap a button to share your feedback.</flux:text>
                <flux:radio.group wire:model.live="rating" variant="buttons" class="mt-3 w-full *:flex items-center justify-center">
                    @foreach (\App\Enums\ExperienceRating::cases() as $opt)
                        <flux:radio class="size-16! aspect-square! text-center" value="{{ $opt->value }}">
                            <span class="block text-lg md:text-xl">{{ $opt->emoji() }}</span>
                            <span class="text-sm">{{ $opt->label() }}</span>
                        </flux:radio>
                    @endforeach
                </flux:radio.group>
            </div>
            @endunless

            @if ($rating && $rating <=2)
                <div class="text-left">
                    <flux:heading level="2" size="lg">We’d love to improve.</flux:heading>
                    <flux:text class="mt-2">Please tell us what went wrong, and we’ll do our best to make it right.</flux:text>
    
                    <form class="mt-4 space-y-4" wire:submit="saveFeedback">
                        @csrf
                        <flux:textarea wire:model="feedback_comment" label="What could we have done better?" />
                        @if (! $contact)
                            {{-- Ask for name and email address if the page was not accesseed through a request link. --}}
                            <div class="grid grid-cols-2 gap-4">
                                <flux:input wire:model="feedback_name" type="text" label="Your name"/>
                                <flux:input wire:model="feedback_email" type="email" label="Your email address" placeholder="your@email.com" />
                            </div>
                        @endif
                        <flux:button type="submit" class="w-full" variant="danger">Submit Feedback</flux:button>
                    </form>
                </div>
            @endif

            @if ($rating && $rating > 2)
                <div class="text-left">
                    <flux:heading level="2" size="lg">We're glad you had a {{ strtolower(\App\Enums\ExperienceRating::from($rating)->label()) }} experience!</flux:heading>
                    <flux:text class="mt-2">Would you mind leaving us a review on one of the following platforms?</flux:text>
                </div>

                <div @class(["grid grid-cols-1 gap-4", "sm:grid-cols-2" => $links->count() > 1])>
                    @forelse ($links as $link)
                        <a href="{{ route('review-page.link', ['slug' => $page->slug, 'ulid' => $link->ulid, 'ref'  => $this->contact ?? null,]) }}" target="_blank" class="block bg-white dark:bg-zinc-800 border dark:border-zinc-600/50 rounded-lg p-4 hover:shadow-md text-center">
                            @php
                                $svgPath = public_path('vendor/blade-simple-icons/' . $link->name . '.svg');
                            @endphp
        
                            @if (file_exists($svgPath))
                                <div class="text-zinc-600 dark:text-zinc-400 size-8 mx-auto">
                                    {!! file_get_contents($svgPath) !!}
                                </div>
                            @else
                                <flux:avatar :name="$link->name" size="sm" :circle="true" class="mx-auto"/>
                            @endif
                            <span class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Review us on {{ ucfirst($link->name) }}</span>
                        </a>
                    @empty
                    @endforelse
                </div>
            @endif
        </flux:card>
    </div>

    @if ($showBranding)
        <div class="text-xs text-zinc-500 dark:text-zinc-400">Powered by <a href="{{ route('home') }}?ref={{ $page->slug }}" class="underline">AfterSay</a></div>
    @endif
</main>
