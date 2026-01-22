<?php

namespace App\Http\Controllers;

use App\Enums\ArticleStatus;
use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', ArticleStatus::Published)->orderBy('published_at')->paginate(15);

        return view('website.blog.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('status', ArticleStatus::Published)->where('slug', $slug)->firstOrFail();

        return view('website.blog.show', compact('article'));
    }
}
