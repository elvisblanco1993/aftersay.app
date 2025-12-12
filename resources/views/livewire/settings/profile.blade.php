<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        @php
            $is_not_native = auth()->user()->google_id;
        @endphp
        @if ($is_not_native)
            <flux:callout icon="info" color="blue" class="mb-6">
                <flux:callout.text>{{ __("Account information is controlled by Google. To update your name or email, please edit them in your Google Account.") }}</flux:callout.text>
            </flux:callout>
        @endif
        <flux:card>
            <form wire:submit="updateProfileInformation" class="space-y-6">
                <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" :disabled="$is_not_native" />
                <div>
                    <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" :disabled="$is_not_native" />
    
                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                        <div>
                            <flux:text class="mt-4">
                                {{ __('Your email address is unverified.') }}
    
                                <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                    {{ __('Click here to re-send the verification email.') }}
                                </flux:link>
                            </flux:text>
    
                            @if (session('status') === 'verification-link-sent')
                                <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </flux:text>
                            @endif
                        </div>
                    @endif
                </div>
    
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full" :disabled="$is_not_native">{{ __('Save') }}</flux:button>
                    </div>
    
                    <x-action-message class="me-3" on="profile-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>
        </flux:card>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
