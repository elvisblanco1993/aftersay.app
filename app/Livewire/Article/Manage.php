<?php

namespace App\Livewire\Article;

use App\Enums\ArticleStatus;
use App\Jobs\GenerateArticle;
use App\Models\Article;
use Flux\Flux;
use Livewire\Component;

class Manage extends Component
{
    public Article $article;

    public $title;

    public $excerpt;

    public $content;

    public $keywords;

    public function mount()
    {
        $this->authorize('viewAny', Article::class);
        $this->title = $this->article->title;
        $this->excerpt = $this->article->excerpt;
        $this->content = $this->article->content;
        $this->keywords = $this->article->keywords;
    }

    public function render()
    {
        return view('livewire.article.manage');
    }

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'keywords' => 'required',
        ]);

        $this->article->update($validated);

        Flux::toast(text: 'Article saved!', variant: 'success');
    }

    public function regenerate()
    {
        $this->article->update(['status' => ArticleStatus::Queued]);
        GenerateArticle::dispatch($this->article);

        Flux::toast(
            heading: 'Regenerating...',
            text: 'Refresh in a little bit to see the latest changes',
            variant: 'success');
    }
}
