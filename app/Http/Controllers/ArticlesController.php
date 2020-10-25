<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest('created_at')->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(int $id): View
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }
}
