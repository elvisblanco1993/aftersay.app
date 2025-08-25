<?php

namespace App\Livewire\Template;

use App\Enums\TemplateStatus;
use App\Enums\TemplateType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.template.create');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $template = Auth::user()->currentTenant
            ->templates()
            ->create([
                'name' => $this->name,
                'type' => TemplateType::Email->value,
                'status' => TemplateStatus::Draft->value,
                'body' => 'Write your message here...',
            ]);

        $this->redirect(url: route('template.update', ['template' => $template]), navigate: true);
    }
}
