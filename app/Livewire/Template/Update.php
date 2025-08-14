<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Livewire\Component;

class Update extends Component
{
    public Template $template;

    public $subject;

    public $body;

    public function mount()
    {
        $this->subject = $this->template->subject;
        $this->body = $this->template->body;
    }

    public function render()
    {
        return view('livewire.template.update');
    }

    public function updatedBody($value)
    {
        $this->body = $value;
        $this->template->update([
            'body' => $value,
        ]);
        $this->dispatch('saved');
    }
}
