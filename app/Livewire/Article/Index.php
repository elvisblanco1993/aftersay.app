<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function mount()
    {
        $this->authorize('viewAny', Article::class);
    }

    public function render()
    {
        return view('livewire.article.index', [
            'articles' => Article::paginate(15),
        ]);
    }
}
