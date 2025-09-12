<?php

namespace App\Livewire\Concern;

use App\Models\Concern;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Resolve extends Component
{
    public Concern $concern;

    public $message;

    public function render()
    {
        return view('livewire.concern.resolve');
    }

    public function save()
    {
        if ($this->message) {
            $this->concern->comments()->create([
                'tenant_id' => $this->concern->tenant_id,
                'user_id' => Auth::id(),
                'message' => $this->message,
            ]);
        }

        $this->concern->update([
            'resolved_at' => now(),
        ]);
    }
}
