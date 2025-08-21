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

    public function mount()
    {
        $this->user = Auth::user();
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
