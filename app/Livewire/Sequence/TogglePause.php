<?php

namespace App\Livewire\Sequence;

use App\Enums\SequenceStatus;
use App\Models\Sequence;
use Livewire\Component;

class TogglePause extends Component
{
    public Sequence $sequence;

    public function render()
    {
        return view('livewire.sequence.toggle-pause', [
            'is_paused' => $this->sequence->status === SequenceStatus::Paused,
        ]);
    }

    public function save()
    {
        $status = $this->sequence->status;

        match ($status) {
            SequenceStatus::Queued,
            SequenceStatus::Running => $this->sequence->update([
                'status' => SequenceStatus::Paused,
            ]),

            SequenceStatus::Paused => $this->sequence->update([
                'next_run_at' => $this->sequence->next_run_at->isPast() ? now()->addMinutes(rand(1, 5)) : $this->sequence->next_run_at,
                'status' => SequenceStatus::Running,
            ]),

            default => null,
        };

        return $this->redirect(url()->previous(), navigate: true);
    }
}
