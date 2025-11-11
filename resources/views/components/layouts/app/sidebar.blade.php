<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-900">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-800 dark:bg-zinc-950">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.item icon="layout-dashboard" :href="route('dashboard')" :current="request()->routeIs('dashboard')">{{ __('Dashboard') }}</flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('contact.index')" :current="request()->routeIs('contact.*')" wire:navigate>{{ __('Contacts') }}</flux:navlist.item>
                <flux:navlist.item icon="megaphone" :href="route('campaign.index')" :current="request()->routeIs('campaign.*')" wire:navigate>{{ __('Campaigns') }}</flux:navlist.item>
                <flux:navlist.item icon="user-star" :href="route('testimonial.index')" :current="request()->routeIs('testimonial.*')" wire:navigate>{{ __('Testimonials') }}</flux:navlist.item>
                <flux:navlist.item icon="mail" :href="route('concern.index')" :current="request()->routeIs('concern.*')" wire:navigate>{{ __('Concerns') }}</flux:navlist.item>
                <flux:navlist.item icon="workflow" :href="route('workflow.index')" :current="request()->routeIs('workflow.*')" wire:navigate>{{ __('Workflows') }}</flux:navlist.item>
                <flux:navlist.item :href="route('template.index')" icon="layout-template" :current="request()->routeIs('template.*')" wire:navigate>{{ __('Templates') }}</flux:navlist.item>
                <flux:navlist.item :href="route('settings.tenant')" icon="settings-2" :current="request()->routeIs('settings.*')" wire:navigate>{{ __('Settings') }}</flux:navlist.item>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                @if (Auth::user()->currentTenant->onTrial())
                    <div class="mb-6 space-y-3 px-3 py-3 border dark:border-zinc-700 rounded-lg">
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <flux:icon.crown variant="micro" class="stroke-pink-600" />
                                <span class="text-sm font-medium leading-none text-zinc-700 dark:text-white">Free Trial</span>
                            </div>
                            <span class="text-xs font-light tracking-wider">{{ ceil(now()->diffInDays(auth()->user()->currentTenant->trialEndsAt())) }} days left</span>
                        </div>

                        <flux:button href="{{ route('billing.plans') }}" size="sm" variant="primary" color="pink" class="w-full">Upgrade Plan</flux:button>
                    </div>
                @endif

                <flux:navlist.item icon="book-open-text" href="https://aftersay.tawk.help" target="_blank">
                {{ __('Support') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-zinc-200 text-black dark:bg-zinc-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                        <flux:radio value="light" icon="sun"></flux:radio>
                        <flux:radio value="dark" icon="moon"></flux:radio>
                        <flux:radio value="system" icon="computer-desktop"></flux:radio>
                    </flux:radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-zinc-200 text-black dark:bg-zinc-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                        <flux:radio value="light" icon="sun"></flux:radio>
                        <flux:radio value="dark" icon="moon"></flux:radio>
                        <flux:radio value="system" icon="computer-desktop"></flux:radio>
                    </flux:radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
