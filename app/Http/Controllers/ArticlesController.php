<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticlesController extends Controller
{
    public function index(): View
    {
        // Render a list of a resource

        $articles = Article::latest('created_at')->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(int $id): View
    {
        // Show a single resource

        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create(): View
    {
        // Show a view to create a new resource

        return view('articles.create');
    }

    public function store()
    {
        // Persist the new resource

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit(int $id): View
    {
        // Show a view to edit an existing resource

        $article = Article::query()->find($id);

        return view('articles.edit', ['article' => $article]);
    }

    public function update(int $id)
    {
        // Persist the edited resource

        $article = Article::query()->find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $id);
    }

    public function destroy()
    {
        // Delete the resource
    }
}
