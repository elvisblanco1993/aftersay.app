<section class="w-full">
    @include('partials.settings-heading')
    <x-settings.layout :heading="__('Billing')" :subheading="__('Manage your subscription and payment details.')">

        <div class="space-y-6">
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <flux:heading size="lg">Your Plan</flux:heading>
                    @if ($user->currentTenant->subscribed('default'))
                        <flux:button size="xs" href="{{ route('billing.update-plan') }}">Change plan</flux:button>
                    @endif
                </div>
                <div class="card space-y-6">
                    <div class="flex items-center justify-between">
                        <flux:heading size="lg">{{ $plan['name'] }}</flux:heading>
                        {{-- Display the plan's amount. --}}
                    </div>
                    <div class="space-y-2 text-sm">
                        <div>Up to {{ $plan['features']['max_contacts'] }} contacts</div>
                        <div>Connect {{ ($plan['features']['max_review_platforms'] > 1) ? $plan['features']['max_review_platforms'] : 'unlimited' }} review platforms</div>
    
                        <div class="flex items-center space-x-2">
                            <span>Unlimited feedback submissions</span>
                        </div>
    
                        <div class="flex items-center space-x-2">
                            <span>Custom branding</span>
                        </div>
                    </div>
                    @if ($user->currentTenant->onTrial())
                        <flux:button variant="primary" href="{{ route('billing.plans') }}">Upgrade Plan</flux:button>
                    @endif
                </div>
            </div>
    
            <div class="space-y-3">
                <flux:heading size="lg">Your Usage</flux:heading>
                <div class="card text-sm space-y-1">
                    <div class="grid grid-cols-4">
                        <div class="col-span-1">Contacts</div>
                        <div class="col-span-3"> {{ $contacts_count }} / {{ $plan['features']['max_contacts'] }}</div>
                    </div>

                    <div class="grid grid-cols-4">
                        <div class="col-span-1">Review Platforms</div>
                        <div class="col-span-3"> {{ $platforms_count }} / {{ ($plan['features']['max_review_platforms'] > 1) ? $plan['features']['max_review_platforms'] : 'unlimited' }}</div>
                    </div>           
                </div>
            </div>

            <div class="space-y-3">
                <flux:heading size="lg">Manage your subscription</flux:heading>
                <div class="card space-y-6">
                    <flux:text>Go to Stripe billing portal to manage your subscription, edit your billing address, payments methods, and more.</flux:text>
                    <flux:button href="{{ route('billing.portal') }}" icon-trailing="arrow-up-right">Open Billing Portal</flux:button>
                </div>
            </div>
        </div>
    </x-settings.layout>
</section>
