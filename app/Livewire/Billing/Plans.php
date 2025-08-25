<?php

namespace App\Livewire\Billing;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Plans extends Component
{
    public function render()
    {
        return view('livewire.billing.plans', [
            'plans' => collect(config('internal.plans')),
        ]);
    }

    public function subscribe($type)
    {
        $plans = config('internal.plans');

        $plan = $plans[$type];

        if (! $plan) {
            return false;
        }

        $tenant = Auth::user()->currentTenant;

        // Check if the tenant has an active subscrtiption
        // If active subscription is detected, redirect to Billing Portal to upgrade/downgrade
        if ($tenant->subscribed('default')) {
            $this->redirect(url: route('billing.portal'));
        }

        // Check for incomplete subscriptions
        if ($tenant->hasIncompletePayment('default') || $tenant->subscription('default')->hasIncompletePayment()) {
            $url = route('cashier.payment', $tenant->subscription('default')->latestPayment()->id);

            $this->redirect($url);
        }

        // Setup subscription
        $url = $tenant->newSubscription('default', $plan['stripe_monthly_price_id'])
            ->checkout([
                'success_url' => route('billing.portal'),
                'cancel_url' => route('billing.plans'),
            ])
            ->url;

        $this->redirect($url);
    }
}
