<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormArticles;
use App\Models\Article;
use App\Models\Step;
use App\Models\Tag;

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
        Article::create($articles->validated());
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

        $articleTags = $article->tags->keyBy('name');
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });

        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();

        $tagsToAttach = $tags->diffKeys($articleTags);
//        $tagsToDetach = $articleTags->diffKeys($tags);
//
//        foreach ($tagsToAttach as $tag) {
//            $tag = Tag::firstOrCreate(['name' => $tag]);
//            $article->tags()->attach($tag);
//        }
//
//        foreach ($tagsToDetach as $tag) {
//            $article->tags()->detach($tag);
//        }
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $article->tags()->sync($syncIds);

        return redirect('/');
    }

}
