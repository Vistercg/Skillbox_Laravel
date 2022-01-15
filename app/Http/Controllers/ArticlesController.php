<?php

namespace App\Http\Controllers;

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

    public function store()
    {
        $this->validate(request(), [
            'slug' => 'required | regex:/[a-z][a-z0-9_-]/ | unique:articles',
            'title' => 'required | min:5 | max: 100',
            'shortBody' => 'required | max: 255',
            'body' => 'required',
            'checkbox' =>'accepted'
        ]);

        Article::create([
            'slug' => request('slug'),
            'title' => request('title'),
            'shortbody' => request('shortBody'),
            'body' => request('body')
        ]);

        return redirect('/');
    }
}
