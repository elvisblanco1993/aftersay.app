<div>
    <flux:modal.trigger name="add-platform">
        <flux:button variant="primary" icon-trailing="plus">Add</flux:button>
    </flux:modal.trigger>
    <flux:modal name="add-platform" class="md:w-xl" :dismissible="false" variant="flyout">   
        <form wire:submit="savePlatform">
            @csrf
            <div class="space-y-6">
                <flux:heading size="lg">Add a review platform</flux:heading>

                <flux:select wire:model.live="provider" label="Select Platform">
                    <option selected value=''>None selected</option>
                    @foreach (config('internal.platforms') as $key => $platform)
                        <option value="{{ $key }}">{{ $platform['name'] }}</option>
                    @endforeach
                </flux:select>

                @if ($provider)
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <div class="font-medium">Instructions</div>
                            <ol class="list-decimal text-sm px-4">
                                @forelse (config("internal.platforms.{$provider}.instructions") as $item)
                                    <li>{{ $item }}</li>
                                @empty
                                @endforelse    
                            </ol>
                        </div>
                        @php
                            $platformName = $provider ? config("internal.platforms.$provider.name") : '';
                            $platformPlaceholder = $provider ? config("internal.platforms.$provider.example_url") : '';
                        @endphp
                        <flux:input wire:model="url" :label="$platformName .' Review Link'"  :placeholder="$platformPlaceholder" />
                    </div>
                @endif

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Save platform</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
