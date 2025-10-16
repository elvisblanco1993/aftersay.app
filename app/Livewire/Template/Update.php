<?php

namespace App\Livewire\Template;

use App\Actions\ParseMessageContent;
use App\Enums\TemplateStatus;
use App\Models\Contact;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
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

    #[On('parse-content')]
    public function parsePreview($preview)
    {
        if ($preview === true) {
            // Create fake contact
            $recipient = Contact::make([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
            ]);
            $content = (new ParseMessageContent)(
                content: $this->body,
                contact: $recipient,
                tenant: Auth::user()->currentTenant,
            );
            $this->body = $content;
        } else {
            $this->body = $this->template->body;
        }
    }
}
