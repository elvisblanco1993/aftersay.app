<?php

namespace App\Listeners;

use App\Models\Tenant;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'invoice.payment_succeeded') {
            $invoice = $event->payload['data']['object'];
            $subscriptionId = $invoice['subscription'] ?? null;

            // Ensure we have a subscription ID
            if (! $subscriptionId) {
                Log::warning('Invoice payment succeeded but no subscription ID found', [
                    'invoice_id' => $invoice['id'],
                ]);

                return;
            }

            // Find the tenant by Stripe customer ID
            $customerId = $invoice['customer'];
            $tenant = Tenant::where('stripe_id', $customerId)->first();

            if (! $tenant) {
                Log::warning('Tenant not found for Stripe customer', [
                    'customer_id' => $customerId,
                ]);

                return;
            }

            // Retrieve full subscription details from Stripe
            $stripeSubscription = $tenant->asStripeCustomer()
                ->subscriptions
                ->retrieve($subscriptionId);

            if (! $stripeSubscription) {
                Log::warning('Could not retrieve subscription from Stripe', [
                    'stripe_subscription_id' => $subscriptionId,
                ]);

                return;
            }

            // Check if subscription already exists
            $existingSubscription = $tenant->subscriptions->where('stripe_id', $subscriptionId)->first();

            if ($existingSubscription) {
                Log::info('Subscription already exists in database', [
                    'subscription_id' => $existingSubscription->id,
                ]);

                return;
            }

            // Create the subscription in the database
            $subscription = $tenant->subscriptions()->create([
                'stripe_id' => $stripeSubscription->id,
                'stripe_status' => $stripeSubscription->status,
                'stripe_price' => $stripeSubscription->items->data[0]->price->id ?? null,
                'quantity' => $stripeSubscription->items->data[0]->quantity ?? 1,
                'trial_ends_at' => $stripeSubscription->trial_end
                    ? date('Y-m-d H:i:s', $stripeSubscription->trial_end)
                    : null,
                'ends_at' => null,
            ]);

            Log::info('Subscription created successfully', [
                'subscription_id' => $subscription->id,
                'tenant_id' => $tenant->id,
                'stripe_subscription_id' => $stripeSubscription->id,
                'status' => $stripeSubscription->status,
            ]);
        }
    }
}
