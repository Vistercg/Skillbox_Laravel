<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeControlled extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();
        return view('welcome', compact('articles'));
    }

    public function about()
    {
        return view('layout.about');
    }
}
