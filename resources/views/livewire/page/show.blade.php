<div>
    <main class="flex-grow flex flex-col items-center justify-center text-center px-6 py-16">
        <div class="w-full max-w-xl space-y-6 rounded-2xl bg-white dark:bg-zinc-800 p-6 shadow-lg">
            <div>
                <flux:heading level="1" size="xl">Thanks for choosing Codewize</flux:heading>
                <flux:text size="lg" class="mt-2">We’d love to know how your experience was!</flux:text>
            </div>

            <div>
                <flux:select :label="__('How was your experience?')">
                    <option value="">Select an option</option>
                    <option value="great">Great</option>
                    <option value="good">Good</option>
                    <option value="okay">Okay</option>
                    <option value="bad">Bad</option>
                    <option value="terrible">Terrible</option>
                </flux:select>
            </div>

            @if (true)
                <div class="text-left">
                    <flux:heading level="2" size="lg" class="text-red-600">We’re sorry to hear that.</flux:heading>
                    <flux:text class="mt-2">Your feedback helps us improve. Please tell us what went wrong, and we’ll do our best to make it right.</flux:text>

                    <form class="mt-4 space-y-4" wire:submit="saveInternalReview">
                        @csrf
                        <flux:textarea placeholder="What could we have done better?" />
                        <flux:input type="email" placeholder="Your email (optional)" />
                        <flux:button class="w-full" variant="danger">Submit Feedback</flux:button>
                    </form>
                </div>
            @endif

        </div>


    </main>
</div>
