<?php

namespace App\Livewire\Article;

use App\Enums\ArticleStatus;
use App\Jobs\GenerateArticle;
use App\Models\Article;
use Livewire\Component;

class Generate extends Component
{
    public $topic;

    public $keyword;

    public function render()
    {
        return view('livewire.article.generate');
    }

    public function generateArticle()
    {
        $article = Article::create([
            'topic' => $this->topic,
            'primary_keyword' => $this->keyword,
            'status' => ArticleStatus::Queued,
        ]);

        GenerateArticle::dispatch($article);
        $this->redirect(url: url()->previous(), navigate: true);
    }
}
