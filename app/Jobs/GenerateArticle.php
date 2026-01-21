<?php

namespace App\Jobs;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Schema\ObjectSchema;
use Prism\Prism\Schema\StringSchema;

class GenerateArticle implements ShouldBeUnique, ShouldQueue
{
    use Queueable;

    public $tries = 5; // The job will be attempted 5 times total

    public $backoff = 60; // Wait 60 seconds between retries

    public $topic;

    public $keyword;

    public $article;

    /**
     * Create a new job instance.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->topic = $article->topic;
        $this->keyword = $article->primary_keyword;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $schema = new ObjectSchema(
            name: 'article',
            description: 'A structured article',
            properties: [
                new StringSchema('title', 'the title of the article'),
                new StringSchema('slug', 'the url slug of the article'),
                new StringSchema('meta_description', 'the meta description of the article (2 to 3 sentences long)'),
                new StringSchema('excerpt', 'an excerpt of the contents of the article'),
                new StringSchema('body', 'the article body'),
                new StringSchema('keywords', 'the relevant list of keywords for the article'),
                new StringSchema('infographic_ideas', 'suggested images/captions or infographic ideas'),
            ],
            requiredFields: ['title', 'slug', 'meta_description', 'excerpt', 'body', 'keywords', 'infographic_ideas']
        );

        $response = Prism::structured()
            ->using(Provider::OpenAI, 'gpt-4o')
            ->withSchema($schema)
            ->withSystemPrompt(view('ai.prompts.article-system-prompt', [
                'topic' => $this->topic,
                'primary_keyword' => $this->keyword,
            ]))
            ->withPrompt('Write an article')
            ->asStructured();

        $article = $response->structured;

        $this->article->update([
            'slug' => $article['slug'],
            'title' => $article['title'],
            'meta_description' => $article['meta_description'],
            'excerpt' => $article['excerpt'],
            'content' => $article['body'],
            'keywords' => $article['keywords'],
            'infographic_ideas' => $article['infographic_ideas'],
            'status' => ArticleStatus::Draft,
        ]);
    }
}
