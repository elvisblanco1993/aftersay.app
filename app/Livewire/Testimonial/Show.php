<?php

namespace App\Livewire\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;

class Show extends Component
{
    public Testimonial $testimonial;

    public function render()
    {
        return view('livewire.testimonial.show');
    }
}
