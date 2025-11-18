<div class="space-y-12">
    <div>
        <flux:heading size="xl">Select Your Plan</flux:heading>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('billing.dashboard') }}">Billing</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Plans</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    @if (! Auth::user()->currentTenant->onTrial() && ! Auth::user()->currentTenant->subscribed('default'))
        <flux:callout icon="triangle-alert" color="pink">
            <flux:callout.heading>Your AfterSay trial has wrapped up</flux:callout.heading>
            <flux:callout.text>We'd love to have you stick around! If you've found value in what we offer, select a plan below to keep going.</flux:callout.text>
        </flux:callout>
    @endif

    <div class="grid grid-cols-2 gap-6">
        @foreach ($plans as $index => $plan)
            <flux:callout inline>
                <flux:callout.heading>Up to {{ $plan['sequences_per_month'] }} sequences</flux:callout.heading>
                @if ($plan['max_review_platforms'] > 0)
                    <flux:callout.text>Up to {{ $plan['max_review_platforms'] }} review platforms</flux:callout.text>
                @else
                    <flux:callout.text>Unlimited review platforms</flux:callout.text>
                @endif
                <x-slot name="actions">
                    <flux:button variant="primary" size="sm" wire:click="subscribe({{ $index }})">Select Plan</flux:button>
                </x-slot>
            </flux:callout>
        @endforeach
    </div>
</div>
