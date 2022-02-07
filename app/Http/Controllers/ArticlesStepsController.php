<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Step;
use Illuminate\Http\Request;

class ArticlesStepsController extends Controller
{
    public function storeSteps(Article $article)
    {
        $article->addStep(\request()->validate([
            'description' => 'required'
        ]));
        return back();
    }

    public function updateSteps(Step $step)
    {
        $method = \request() -> has('completed') ? 'complete' : 'incomplete';
        $step->{$method}();
        return back();
    }
}
