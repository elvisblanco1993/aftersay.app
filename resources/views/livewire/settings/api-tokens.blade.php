<section class="w-full">
    @include('partials.settings-heading')
    <x-settings.layout :heading="__('Api Tokens')" :subheading="__('Api tokens allow third-party services to authenticate with our application on your behalf.')">
        <ul class="space-y-3">
            @forelse ($tokens as $token)
                <li class="minicard flex items-center justify-between text-sm">
                    <span>{{ $token->name }}</span>
                    <flux:button wire:click="delete({{ $token->id }})" wire:confirm="Are you sure you want to delete this token?\nAny applications using it will stop working." size="xs">Delete</flux:button>
                </li>
            @empty
                    <flux:callout icon="information-circle" heading="You haven't created any tokens yet."></flux:callout>
            @endforelse
        </ul>

        <div class="mt-6">
            <flux:modal.trigger name="addToken">
                <flux:button variant="primary" icon-trailing="plus">Add</flux:button>
            </flux:modal.trigger>
        </div>

        <flux:modal name="addToken" class="md:w-96">
            <form wire:submit="create">
                @csrf
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">New Api Token</flux:heading>
                    </div>

                    <flux:input wire:model="name" label="Name" />

                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Add token</flux:button>
                    </div>
                </div>
            </form>
        </flux:modal>

        <flux:modal name="showToken" class="md:w-128" :dismissible="false">
            @if ($plainTextToken)
                <div class="space-y-6">
                    <div class="space-y-2">
                        <flux:heading size="lg">Your Token</flux:heading>
                        <flux:text>This token will only be visible once. Make sure to copy it and store it somewhere secure.</flux:text>
                    </div>
                    <flux:input wire:model="plainTextToken" readonly copyable />

                    <div class="flex">
                        <flux:spacer />
                        <flux:modal.close>    
                            <flux:button>Close</flux:button>
                        </flux:modal.close>
                    </div>
                </div>
            @endif
        </flux:modal>

    </x-settings.layout>
</section>
