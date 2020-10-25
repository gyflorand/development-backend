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

    public function create()
    {
        // Shows a view to create a new resource
    }

    public function store()
    {
        // Persist the new resource
    }

    public function edit()
    {
        // Show a view to edit an existing resource
    }

    public function update()
    {
        // Persist the edited resource
    }

    public function destroy()
    {
        // Delete the resource
    }
}
