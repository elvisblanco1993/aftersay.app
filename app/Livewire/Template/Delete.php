<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Flux\Flux;
use Livewire\Component;

class Delete extends Component
{
    public Template $template;

    public function render()
    {
        return view('livewire.template.delete');
    }

    public function delete()
    {
        $this->authorize('delete', $this->template);

        $this->template->steps()->delete();
        $this->template->delete();

        Flux::toast(text: 'Template deleted!', variant: 'success');

        $this->redirect(url: route('template.index'), navigate: true);
    }
}
