<div class="space-y-6">

    <flux:navbar :scrollable="true">
        <flux:navbar.item :href="route('settings.tenant')" wire:navigate>{{ __('Company') }}</flux:navbar.item>
        <flux:navbar.item :href="route('settings.page')" wire:navigate>{{ __('Page') }}</flux:navbar.item>
        <flux:navbar.item :href="route('settings.platforms')" wire:navigate>{{ __('Links') }}</flux:navbar.item>
        <flux:navbar.item :href="route('settings.api-tokens')" wire:navigate>{{ __('Api Tokens') }}</flux:navbar.item>
        <flux:navbar.item :href="route('billing.dashboard')" wire:navigate>{{ __('Billing') }}</flux:navbar.item>
        <flux:navbar.item :href="route('settings.profile')" wire:navigate>{{ __('Profile') }}</flux:navbar.item>
        <flux:navbar.item :href="route('settings.password')" wire:navigate>{{ __('Change Password') }}</flux:navbar.item>
        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <flux:navbar.item :href="route('two-factor.show')" wire:navigate>{{ __('Two-Factor Auth') }}</flux:navbar.item>
        @endif
    </flux:navbar>

    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6 md:col-span-2">
            <flux:heading size="lg">{{ $heading ?? '' }}</flux:heading>
            <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>
        </div>
        <div class="col-span-6 md:col-span-4">
            {{ $slot }}
        </div>
    </div>
</div>
