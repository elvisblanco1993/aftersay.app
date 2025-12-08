<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

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
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
    }
}
