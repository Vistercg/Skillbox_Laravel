<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('owner_id', auth()->id())->with('tags')->latest()->get();
        return view('welcome', compact('articles'));
    }

    public function about()
    {
        return view('layout.about');
    }
}
