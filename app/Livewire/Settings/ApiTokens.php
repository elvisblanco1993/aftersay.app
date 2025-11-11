<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ApiTokens extends Component
{
    #[Validate('required')]
    public $name;

    public $plainTextToken;

    public $user;

    public $contacts_endpoint;

    public $testimonials_endpoint;

    public function mount()
    {
        $this->user = Auth::user();
        $this->contacts_endpoint = route('api.contacts.create');
        $this->testimonials_endpoint = route('api.testimonials', ['tenant' => $this->user->currentTenant]);
    }

    public function create()
    {
        $this->validate();
        $token = $this->user->createToken($this->name);
        $this->plainTextToken = $token->plainTextToken;
        $this->reset('name');
        $this->modal('addToken')->close();
        $this->modal('showToken')->show();
    }

    public function delete($tokenId)
    {
        $this->user->tokens()->where('id', $tokenId)->delete();
    }

    public function render()
    {
        return view('livewire.settings.api-tokens', [
            'tokens' => $this->user->tokens,
        ]);
    }
}
