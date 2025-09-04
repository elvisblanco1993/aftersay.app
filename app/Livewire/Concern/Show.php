<?php

namespace App\Livewire\Concern;

use App\Models\Concern;
use Livewire\Component;

class Show extends Component
{
    public Concern $concern;

    public function render()
    {
        return view('livewire.concern.show');
    }
}
