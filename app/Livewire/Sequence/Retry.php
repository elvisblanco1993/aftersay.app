<?php

namespace App\Livewire\Sequence;

use App\Enums\SequenceStatus;
use App\Models\Sequence;
use Flux\Flux;
use Livewire\Component;

class Retry extends Component
{
    public Sequence $sequence;

    public function render()
    {
        return view('livewire.sequence.retry');
    }

    public function save()
    {
        $this->sequence->update([
            'status' => SequenceStatus::Queued->value,
            'next_run_at' => now()->addMinutes(rand(1, 5)),
        ]);

        Flux::toast(text: "We're retrying a sequence", variant: 'success');

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
