<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Livewire\Component;

class Update extends Component
{
    public Template $template;

    public $subject;

    public $body;

    public $name;

    public function mount()
    {
        $this->subject = $this->template->subject;
        $this->body = $this->template->body;
        $this->name = $this->template->name;
    }

    public function render()
    {
        return view('livewire.template.update');
    }

    public function save()
    {
        $this->template->update([
            'name' => $this->name,
            'subject' => $this->subject,
            'body' => $this->body,
        ]);
        $this->dispatch('saved');
    }
}
