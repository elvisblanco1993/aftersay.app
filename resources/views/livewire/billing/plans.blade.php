<div class="space-y-12">
    <div>
        <flux:heading size="xl">Select Your Plan</flux:heading>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('billing.dashboard') }}">Billing</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Plans</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    @foreach ($plans as $index => $plan)
        <div class="card !px-6 space-y-4">
            <flux:heading>Up to {{ $plan['campaigns_per_month'] }} campaigns</flux:heading>

            <div class="grid grid-cols-3 md:gap-4">
                <div class="col-span-3 md:col-span-1">
                    <div class="flex items-center space-x-1">
                        <flux:icon.check-circle variant="micro" class="fill-green-600"/>
                        <span>Up to {{ $plan['max_review_platforms'] }} review platforms</span>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="flex items-center space-x-1">
                        <flux:icon.x-circle variant="micro" class="fill-red-600"/>
                        <span>White Label</span>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 col-span-3 md:col-span-1 text-center">
                    <div class="text-zinc-500 dark:text-zinc-300"><span class="text-2xl font-bold">${{ $plan['price_monthly'] }}</span>/month</div>
                </div>
            </div>
            <flux:button variant="primary" wire:click="subscribe({{ $index }})">Select Plan</flux:button>
        </div>
    @endforeach
</div>
