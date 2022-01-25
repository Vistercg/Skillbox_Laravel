<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormArticles;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function create()
    {
        return view('layout.create');
    }

    public function show(Article $article)
    {
        return view('layout.show', compact('article'));
    }

    public function store(FormArticles $articles)
    {

        Article::create( $articles->validated());

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

    public function update(FormArticles $articles, Article $article)
    {

        $article->update($articles->validated());

        return redirect('/');

    }
}
