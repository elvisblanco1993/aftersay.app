<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Try AfterSay for free')" :description="__('Just need a few things to get you going...')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Your name')"
        />

        <flux:input
            wire:model="business_name"
            :label="__('Your organization\'s name')"
            type="text"
            required
            autofocus
            autocomplete="business_name"
            :placeholder="__('Codewize LLC.')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Your email')"
            type="email"
            required
            autocomplete="email"
            placeholder="julie@codewize.co"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
            viewable
        />

        <x-turnstile wire:model="captcha" />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')">{{ __('Log in') }}</flux:link>
    </div>
</div>
