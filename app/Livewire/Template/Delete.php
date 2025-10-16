<?php

namespace App\Livewire\Template;

use App\Models\Template;
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

        session()->flash('flash.banner', 'Template deleted!');
        session()->flash('flash.bannerStyle', 'success');

        $this->redirect(url: route('template.index'), navigate: true);
    }
}
