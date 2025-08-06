<?php

namespace App\Livewire\Auth;

use App\Actions\CreateDefaultWorkflow;
use App\Models\Page;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $business_name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    protected $user;

    protected $tenant;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::transaction(function () use ($validated) {
            $this->user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($validated['password']),
            ]);

            $this->tenant = Tenant::create([
                'user_id' => $this->user->id,
                'name' => $this->business_name,
                'email' => $this->email,
            ]);

            // Create public facing page
            $slug = Page::generateUniqueSlug($this->business_name, $this->tenant->id);
            Page::create([
                'tenant_id' => $this->tenant->id,
                'slug' => $slug,
                'heading' => 'Thank you for choosing '.$this->business_name,
                'subheading' => 'We’d love to know how your experience was!',
            ]);

            $this->user->update(['current_tenant_id' => $this->tenant->id]);

            $this->tenant->createAsStripeCustomer();

            // Populate tenant with default templates
            foreach (config('internal.review_templates') as $template) {
                $this->tenant->templates()->create([
                    'type' => $template['type'],
                    'name' => $template['name'],
                    'subject' => $template['type'] === 'email' ? $template['subject'] : null,
                    'body' => $template['body'],
                ]);
            }

            CreateDefaultWorkflow::class;
        });

        $this->tenant->users()->syncWithoutDetaching([
            $this->user->id => ['permissions' => json_encode(['*'])],
        ]);

        event(new Registered($this->user));

        Auth::login($this->user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
