<section class="w-full">
    @include('partials.settings-heading')
    <x-settings.layout :heading="__('Api Tokens')" :subheading="__('API tokens let you securely connect third-party apps and services to your account.')">
        <div class="space-y-6">
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
    
            <div>
                <flux:modal.trigger name="addToken">
                    <flux:button variant="primary" icon-trailing="plus">Generate New Token</flux:button>
                </flux:modal.trigger>
            </div>

            <flux:separator />

            <div class="space-y-2">
                <flux:heading size="lg">Connect with the WordPress Plugin</flux:heading>
                <flux:text>Use our official WordPress plugin to automatically display your collected testimonials on your website - no coding required.</flux:text>
                <flux:link class="text-sm" :href="asset('downloads/aftersay-wp.zip')">Download the WordPress Plugin</flux:link>
            </div>

            <flux:input wire:model="testimonials_endpoint" readonly copyable label="Testimonials API Endpoint" />
            <flux:text>Use your API token for authentication. You can create one using the <strong>Generate New Token</strong> button above.</flux:text>

            <flux:separator />

            <div class="space-y-2">
                <flux:heading size="lg">Custom Contact Intake (Advanced)</flux:heading>
                <flux:text>Use this endpoint to create contacts directly from your own apps or forms via <strong>POST</strong> requests.</flux:text>
            </div>

            <flux:input wire:model="contacts_endpoint" readonly copyable label="Contact Submission Endpoint" description="Submit new testimonials directly to your account using this endpoint:" />
            <flux:text>Authenticate with your API token. You can create one above clicking <strong>Generate New Token</strong>.</flux:text> 
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
