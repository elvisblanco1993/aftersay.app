<?php

namespace App\Http\Controllers\Auth;

use App\Actions\CreateDefaultWorkflow;
use App\Enums\TemplateStatus;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
            ]
        );

        /**
         * New signups
         */
        if (! $user->current_tenant_id && $user->ownedTenants()->count() === 0) {
            // Create tenant
            $tenant = Tenant::create([
                'user_id' => $user->id,
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'trial_ends_at' => now()->addDays(30)->endOfDay(),
            ]);

            // Create page
            $slug = Page::generateUniqueSlug($googleUser->getName(), $tenant->id);
            Page::create([
                'tenant_id' => $tenant->id,
                'slug' => $slug,
                'heading' => 'Thank you for choosing '.$googleUser->getName(),
                'subheading' => "We'd love to know how your experience was!",
            ]);

            // Assign tenant to user
            $user->update(['current_tenant_id' => $tenant->id]);

            // Create Stripe Customer
            $tenant->createOrGetStripeCustomer();

            // Make user the admin for the tenant
            $tenant->users()->syncWithoutDetaching([
                $user->id => ['permissions' => json_encode(['*'])],
            ]);

            // Populate tenant with default templates
            foreach (config('internal.review_templates') as $template) {
                $tenant->templates()->create([
                    'type' => $template['type'],
                    'name' => $template['name'],
                    'subject' => $template['type'] === 'email' ? $template['subject'] : null,
                    'body' => $template['body'],
                    'status' => TemplateStatus::Published,
                ]);
            }

            // Create default sequence workflow
            app(CreateDefaultWorkflow::class)($user);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
