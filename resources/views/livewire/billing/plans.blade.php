<div class="space-y-12">
    <div>
        <flux:heading size="xl">Select Your Plan</flux:heading>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('billing.dashboard') }}">Billing</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Plans</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="card !px-6 space-y-4">
        <flux:heading size="xl">{{ $plans['starter']['name'] }}</flux:heading>

        <div class="grid grid-cols-3 md:gap-4">
            <div class="col-span-3 md:col-span-1">
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Up to {{ $plans['starter']['features']['max_contacts'] }} contacts</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Up to {{ $plans['starter']['features']['max_review_platforms'] }} review platforms</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Unlimited feedback submissions</span>
                </div>
            </div>
            <div class="col-span-3 md:col-span-1">
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Custom branding</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Analytics</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.x-circle variant="micro" class="fill-red-600"/>
                    <span>White Label</span>
                </div>
            </div>
            <div class="mt-4 md:mt-0 col-span-3 md:col-span-1 text-center">
                <div class="text-zinc-500 dark:text-zinc-300"><span class="text-5xl lg:text-6xl font-bold">${{ $plans['starter']['price_monthly'] }}</span>/month</div>
            </div>
        </div>
        <flux:button variant="primary" wire:click="subscribe('starter')">Select Plan</flux:button>
    </div>

    <div class="card !px-6 space-y-4">
        <flux:heading size="xl">{{ $plans['growth']['name'] }}</flux:heading>

        <div class="grid grid-cols-3 md:gap-4">
            <div class="col-span-3 md:col-span-1">
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Up to {{ $plans['growth']['features']['max_contacts'] }} contacts</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Up to {{ $plans['growth']['features']['max_review_platforms'] }} review platforms</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Unlimited feedback submissions</span>
                </div>
            </div>
            <div class="col-span-3 md:col-span-1">
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Custom branding</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Analytics</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>White Label</span>
                </div>
            </div>
            <div class="mt-4 md:mt-0 col-span-3 md:col-span-1 text-center">
                <div class="text-zinc-500 dark:text-zinc-300"><span class="text-5xl lg:text-6xl font-bold">${{ $plans['growth']['price_monthly'] }}</span>/month</div>
            </div>
        </div>
        <flux:button variant="primary" wire:click="subscribe('growth')">Select Plan</flux:button>
    </div>

    <div class="card !px-6 space-y-4">
        <flux:heading size="xl">{{ $plans['business']['name'] }}</flux:heading>

        <div class="grid grid-cols-3 md:gap-4">
            <div class="col-span-3 md:col-span-1">
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Up to {{ $plans['business']['features']['max_contacts'] }} contacts</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Unlimited review platforms</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Unlimited feedback submissions</span>
                </div>
            </div>
            <div class="col-span-3 md:col-span-1">
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Custom branding</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>Analytics</span>
                </div>
                <div class="flex items-center space-x-1">
                    <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                    <span>White Label</span>
                </div>
            </div>
            <div class="mt-4 md:mt-0 col-span-3 md:col-span-1 text-center">
                <div class="text-zinc-500 dark:text-zinc-300"><span class="text-5xl lg:text-6xl font-bold">${{ $plans['business']['price_monthly'] }}</span>/month</div>
            </div>
        </div>
        <flux:button variant="primary" wire:click="subscribe('business')">Select Plan</flux:button>
    </div>
</div>
