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

    public function show(Article $article): View
    {
        // Show a single resource

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

        Article::create(
            request()->validate(
                [
                    'title' => ['required'],
                    'excerpt' => ['required'],
                    'body' => ['required'],
                ]
            )
        );

        return redirect('/articles');
    }

    public function edit(Article $article): View
    {
        // Show a view to edit an existing resource

        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {
        // Persist the edited resource

        $article->update(
            request()->validate(
                [
                    'title' => ['required'],
                    'excerpt' => ['required'],
                    'body' => ['required'],
                ]
            )
        );

        return redirect('/articles/' . $article->id);
    }

    public function destroy()
    {
        // Delete the resource
    }
}
