<?php

namespace App\Livewire\Waitlist;

use App\Models\Subscriber;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.web')]
class Join extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.waitlist.join');
    }

    public function save()
    {
        $this->validate(['email' => 'required']);
        Subscriber::updateOrCreate(['email' => $this->email]);
        $this->reset();
        $this->dispatch('joined');
    }
}
