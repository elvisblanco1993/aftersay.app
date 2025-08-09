<?php

namespace App\Livewire\Workflow\Step;

use App\Enums\DelayUnit;
use App\Enums\WorkflowActionType;
use App\Models\Workflow;
use Livewire\Component;

class Create extends Component
{
    public Workflow $workflow;

    public $action = WorkflowActionType::SendEmail->value;

    public bool $delayed = false;

    public $delay = 10;

    public $delay_unit = DelayUnit::Minutes->value;

    public $content_type = 'template';

    public $template_id;

    public $custom_message;

    public function render()
    {
        return view('livewire.workflow.step.create', [
            'templates' => $this->workflow->tenant->templates,
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

        $order = ($this->workflow->steps()->max('order') ?? 0) + 1;

        $this->workflow->steps()->create([
            'action' => $this->action,
            'order' => $order,
            'delay' => $this->delayed ? $this->delay : 0,
            'delay_unit' => $this->delayed ? $this->delay_unit : 'minutes',
            'template_id' => $this->content_type === 'template' ? $this->template_id : null,
            'custom_message' => $this->content_type === 'custom' ? $this->custom_message : null,
        ]);

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
