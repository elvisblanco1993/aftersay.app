<main class="flex flex-col items-center justify-between px-6 py-16 space-y-6">
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

        <form wire:submit="save">
            @csrf
            <div class="w-full md:min-w-xl md:max-w-xl space-y-6 card md:drop-shadow-xl/5">
                <flux:input wire:model="title" label="Testimonial Title" placeholder="e.g., Outstanding Service!" />
                <flux:textarea wire:model="content" label="Your Testimonial" placeholder="Tell us about your experience... What did you like most? How did we help you?" />
    
                <flux:separator />
    
                <flux:heading size="lg">Your Information</flux:heading>
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <flux:input wire:model="author_name" label="Your Full Name" placeholder="John Doe" />
                    <flux:input wire:model="author_title" label="Your Title/Role" placeholder="CEO, Manager, etc." />
                </div>
    
                <flux:input wire:model="company" label="Company Name" placeholder="ACME Corporation" />
    
                <flux:field>
                    <flux:label>Upload Your Headshot</flux:label>
                    <flux:input wire:model="headshot" type="file" accept="image/jpg,image/png" />
                    <flux:description class="-mt-0.5!">
                        <div class="flex items-center gap-1">
                            <flux:icon.information-circle variant="micro" />
                            <span>Please upload your professional photo</span>
                        </div>
                    </flux:description>
                    <flux:error name="headshot" />
                </flux:field>
    
                <flux:checkbox wire:model="terms" label="I agree to allow my testimonial to be published on your website and marketing materials." />
    
                <flux:button type="submit" variant="primary" class="w-full">Submit Testimonial</flux:button>
            </div>
        </form>
    </div>

    @if ($showBranding)
        <div class="text-center text-xs text-zinc-500 dark:text-zinc-400">Powered by <a href="{{ route('home') }}?ref={{ $page->slug }}" class="underline">AfterSay</a></div>
    @endif
</main>
