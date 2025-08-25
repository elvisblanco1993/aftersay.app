<?php

namespace App\Livewire\Template;

use App\Enums\TemplateStatus;
use App\Models\Template;
use Livewire\Component;

class Update extends Component
{
    public Template $template;

    public $subject;

    public $body;

    public $name;

    public bool $is_enabled;

    public function mount()
    {
        $this->subject = $this->template->subject;
        $this->body = $this->template->body;
        $this->name = $this->template->name;
        $this->is_enabled = $this->template->status === TemplateStatus::Published ? true : false;
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

    public function updatedIsEnabled()
    {
        $status = $this->is_enabled === true ? TemplateStatus::Published : TemplateStatus::Draft;
        $this->template->update(['status' => $status]);
    }
}
