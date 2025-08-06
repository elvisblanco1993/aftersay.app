<div class="max-w-3xl mx-auto">
    <form wire:submit="save">
        @csrf
        <div class="space-y-8">
            <flux:heading size="xl">Let’s get you set up 🚀</flux:heading>
            <flux:subheading size="lg">Answer a few quick questions and you'll be ready to collect glowing reviews in no time.</flux:subheading>
        
            @if ($step === 1)
                <div class="space-y-4 bg-zinc-50 dark:bg-zinc-700/50 px-4 py-6 rounded-xl border dark:border-zinc-700">
                    <flux:heading size="lg">Step 1: Tell us about your business</flux:heading>
            
                    <flux:separator />
            
                    <div class="grid grid-cols-2 gap-6">
                        <flux:input wire:model="business_name" label="Business Name" />
                        <flux:select wire:model="industry" label="Industry">
                            <option value="">Select an option</option>
                            @forelse (config('internal.industries') as $opt)
                                <option value="{{ $opt }}">{{ $opt }}</option>
                            @empty
                            @endforelse
                        </flux:select>
                        <flux:select wire:model.live="country" label="Country">
                            <option value="">Select an option</option>
                            @forelse (config('internal.countries') as $opt)
                                <option value="{{ $opt }}">{{ $opt }}</option>
                            @empty
                            @endforelse
                        </flux:select>
                        <flux:input wire:model="website" type="url" label="Website" />
                        <flux:input wire:model="phone" type="tel" label="Business Phone" />
                        <flux:input wire:model="logo" type="file" label="Upload Logo" />
                    </div>
                </div>
            @endif
            
            @if ($step === 2)
                <div class="space-y-4 bg-zinc-50 dark:bg-zinc-700/50 px-4 py-6 rounded-xl border dark:border-zinc-700">
                    <flux:heading size="lg">Step 2: Personalize your review page</flux:heading>
            
                    <flux:separator />
            
                    <flux:input wire:model="page_heading" type="text" label="Review Page Heading" />
                    <flux:textarea wire:model="page_subheading" label="Review Page Subheading" rows="2"/>
                </div>
            @endif
        
            @if ($step === 3)
                <div class="space-y-4 bg-zinc-50 dark:bg-zinc-700/50 px-4 py-6 rounded-xl border dark:border-zinc-700">
                    <div class="flex items-center justify-between">
                        <flux:heading size="lg">Step 3: Link your review platforms</flux:heading>
                        <livewire:platform.add />
                    </div>
                            
                    <div class="bg-white dark:bg-zinc-800 overflow-hidden border rounded-xl dark:border-zinc-600 divide-y dark:divide-zinc-600">
                        @forelse ($platforms as $platform)
                            <div class="p-2 flex items-center justify-between hover:bg-accent/30">
                                <div class="flex items-center gap-2">
                                    @php
                                        $svgPath = public_path('vendor/blade-simple-icons/' . $platform->name . '.svg');
                                    @endphp
                
                                    @if (file_exists($svgPath))
                                        <div class="text-zinc-600 dark:text-zinc-400 size-8">
                                            {!! file_get_contents($svgPath) !!}
                                        </div>
                                    @else
                                        <flux:avatar :name="$platform->name" size="sm" :circle="true"/>
                                    @endif
                
                                    <span class="inline-flex items-center text-sm font-medium [:where(&)]:text-zinc-800 [:where(&)]:dark:text-zinc-200">{{ config("internal.platforms.{$platform->name}.name") }}</span>
                                </div>
                                <livewire:platform.delete :platform="$platform" wire:key="{{ $loop->index }}" />
                            </div>
                        @empty
                            <flux:callout :heading="__('Your platforms will show here.')" color="blue" icon="information-circle" />
                        @endforelse

                    </div>
                    <flux:error name="platforms" />
                </div>
            @endif

            @if ($step === 3)
                <flux:button type="submit" class="w-full" variant="primary" color="emerald" icon-trailing="rocket">Launch My Review Page</flux:button>
            @else
                <div class="flex items-center justify-between">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary" color="emerald" icon-trailing="arrow-right">Next</flux:button>
                </div>
            @endif

        
            <flux:text class="text-center">You can update these settings anytime later.</flux:text>
        </div>
    </form>
</div>
