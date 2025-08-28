<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function billingPortal(Request $request)
    {
        return $request->user()->currentTenant->redirectToBillingPortal(returnUrl: route('billing.dashboard'));
    }

    public function updatePlan(Request $request)
    {
        return $request->user()->currentTenant
            ->redirectToBillingPortal(
                returnUrl: route('billing.dashboard'),
                options: [
                    'flow_data' => [
                        'type' => 'subscription_update',
                        'subscription_update' => [
                            'subscription' => $request->user()->currentTenant->subscription('default')->stripe_id,
                        ],
                    ],
                ]);
    }
}
