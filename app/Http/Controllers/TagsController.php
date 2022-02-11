<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles()->where('owner_id', auth()->id())->with('tags')->get();
        return view('welcome', compact('articles'));
    }
}
