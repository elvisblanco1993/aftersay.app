<?php

namespace App\Livewire\Sequence;

use App\Enums\SequenceStatus;
use App\Models\Sequence;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Restart extends Component
{
    public Sequence $sequence;

    public function render()
    {
        return view('livewire.sequence.restart');
    }

    public function restart()
    {
        DB::transaction(function () {
            $this->sequence->logs()->delete();
            $this->sequence->update([
                'current_step' => 1,
                'status' => SequenceStatus::Queued->value,
                'next_run_at' => now()->addMinutes(rand(1, 5)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
