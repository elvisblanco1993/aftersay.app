<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.group heading="Your organization">
                <flux:navlist.item :href="route('settings.tenant')" wire:navigate>{{ __('Company Info') }}</flux:navlist.item>
                <flux:navlist.item :href="route('settings.page')" wire:navigate>{{ __('Page') }}</flux:navlist.item>
                <flux:navlist.item :href="route('settings.platforms')" wire:navigate>{{ __('Platforms') }}</flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group heading="Personal details">
                <flux:navlist.item :href="route('settings.profile')" wire:navigate>{{ __('Your Profile') }}</flux:navlist.item>
                <flux:navlist.item :href="route('settings.password')" wire:navigate>{{ __('Change Password') }}</flux:navlist.item>
                <flux:navlist.item :href="route('settings.appearance')" wire:navigate>{{ __('Appearance') }}</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="flex items-center justify-between">
            <div>
                <flux:heading>{{ $heading ?? '' }}</flux:heading>
                <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>
            </div>
            <div>{{ $actions ?? '' }}</div>
        </div>

        <div>{{ $container ?? '' }}</div>

        <div class="mt-5 w-full">
            {{ $slot }}
        </div>
    </div>
</div>
