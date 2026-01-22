<?php

namespace App\Livewire\Article;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Flux\Flux;
use Livewire\Component;

class Publish extends Component
{
    public Article $article;

    public $status;

    public function mount()
    {
        $this->status = $this->article->status;
    }

    public function render()
    {
        return view('livewire.article.publish');
    }

    public function updatedStatus()
    {
        $published_at = $this->status === ArticleStatus::Published ? now() : null;
        $this->article->update([
            'status' => $this->status,
            'published_at' => $published_at,
        ]);

        Flux::toast(text: 'Article set to: '.$this->status->label(), variant: 'success');
    }
}
