<?php

namespace App\Console\Commands;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the sitemap for the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->deleteSitemap();

        $sitemap = Sitemap::create()
            ->add(Url::create(route('home')))
            ->add(Url::create(route('about')))
            ->add(Url::create(route('blog.index')));

        Article::where('status', ArticleStatus::Published)
            ->wherePast('published_at')
            ->each(function ($article) use ($sitemap) {
                $sitemap->add(
                    Url::create(route('blog.show', $article->slug))
                        ->setLastModificationDate($article->updated_at)
                );
            });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }

    protected function deleteSitemap()
    {
        $path = public_path('sitemap.xml');

        if (! File::exists($path)) {
            return Command::SUCCESS;
        }

        File::delete($path);
    }
}
