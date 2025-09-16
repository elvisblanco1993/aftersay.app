<?php

namespace App\Livewire\Concern;

use App\Enums\ConcernStatus;
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

        // Save the concern resolution.
        $this->concern->update([
            'status' => ConcernStatus::Resolved,
            'resolved_at' => now(),
        ]);

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
