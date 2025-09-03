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
        <div wire:ignore>
            <x-turnstile wire:model="captcha" data-action="register" />
        </div>

        <flux:field variant="inline">
            <flux:checkbox wire:model="terms" />
            <flux:label>
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms').'" class="mx-1 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy').'" class="mx-1 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                ]) !!}
            </flux:label>
            <flux:error name="terms" />
        </flux:field>


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
