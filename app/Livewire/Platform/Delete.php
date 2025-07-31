<?php

namespace App\Livewire\Platform;

use App\Models\Platform;
use Livewire\Component;

class Delete extends Component
{
    public Platform $platform;

    public function render()
    {
        return view('livewire.platform.delete');
    }

    public function delete()
    {
        $this->authorize('delete', $this->platform);

        $this->platform->delete();

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
