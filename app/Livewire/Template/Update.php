<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Livewire\Component;

class Update extends Component
{
    public Template $template;

    public $body;

    public function mount()
    {
        $this->body = $this->template->body;
    }

    public function render()
    {
        return view('livewire.template.update');
    }

    public function contentChanged($editorId, $content)
    {
        // $editorId is the id use when you initiated the livewire component
        // $content is the raw text editor content

        // save to the local variable...
        $this->body = $content;
        $this->template->update([
            'body' => $content,
        ]);
    }
}
