<?php

namespace App\Livewire\Workflow\Step;

use App\Enums\DelayUnit;
use App\Models\WorkflowStep;
use Livewire\Component;

class Update extends Component
{
    public WorkflowStep $step;

    public $action;

    public bool $delayed;

    public $delay = 10;

    public $delay_unit = DelayUnit::Minutes->value;

    public $content_type;

    public $template_id;

    public $custom_message;

    public function mount()
    {
        $this->action = $this->step->action;
        $this->delay = $this->step->delay;
        $this->delay_unit = $this->step->delay_unit;
        $this->delayed = $this->delay > 0 ? true : false;
        $this->template_id = $this->step->template_id;
        $this->custom_message = $this->step->custom_message;
        $this->content_type = $this->template_id ? 'template' : 'custom';
    }

    public function render()
    {
        return view('livewire.workflow.step.update', [
            'templates' => $this->step->workflow->tenant->templates,
        ]);
    }

    public function save()
    {
        $this->validate([
            'action' => ['required'],
            'template_id' => ['required_if:content_type,template'],
            'custom_message' => ['required_if:content_type,custom'],
        ], [
            'template_id.required_if' => 'Please select a template or switch to custom message.',
            'custom_message.required_if' => 'Please write a message or switch to using a template.',
        ]);

        $this->step->update([
            'action' => $this->action,
            'delay' => $this->delayed ? $this->delay : 0,
            'delay_unit' => $this->delayed ? $this->delay_unit : 'minutes',
            'template_id' => $this->content_type === 'template' ? $this->template_id : null,
            'custom_message' => $this->content_type === 'custom' ? $this->custom_message : null,
        ]);

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
