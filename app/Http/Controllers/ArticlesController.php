<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormArticles;
use App\Models\Article;
use App\Services\TagsSynchronizer;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('layout.create');
    }

    public function show(Article $article)
    {
        return view('layout.show', compact('article'));
    }

    public function store(FormArticles $articles, TagsSynchronizer $tagsSynchronizer)
    {
        $article = Article::create($articles->validated());
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) {
            return $item;
        });
        $tagsSynchronizer->sync($tags, $article);
        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/');
    }

    public function edit(Article $article)
    {
        return view('layout.edit', compact('article'));
    }

    public function update(FormArticles $articles, Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $article->update($articles->validated());
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) {
            return $item;
        });
        $tagsSynchronizer->sync($tags, $article);
        return redirect('/');
    }
}
