<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticlesController extends Controller
{
    public function show(int $id): View
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }
}
