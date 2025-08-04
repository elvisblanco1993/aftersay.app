<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    public int $per_page = 15;

    #[Url(except: '')]
    public ?string $query = '';

    public function render()
    {
        return view('livewire.template.index', [
            'templates' => Template::search($this->query)
                ->paginate($this->per_page),
        ]);
    }
}
