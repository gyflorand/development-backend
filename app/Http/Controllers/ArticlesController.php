<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class ArticlesController extends Controller
{
	public function index(): View
	{
		// Render a list of a resource

		if (request('tag')) {
			$articles = Tag::query()->where('name', request('tag'))->firstOrFail()->articles;
		} else {
			$articles = Article::latest('created_at')->get();
		}

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

		return view(
			'articles.create',
			[
				'tags' => Tag::all(),
			]
		);
	}

	public function store()
	{
		// Persist the new resource

		$this->validateArticle();

		$article = new Article(request(['title', 'excerpt', 'body']));
		$article->user_id = 1;
		$article->save();

		$article->tags()->attach(request('tags'));

		return redirect(route('articles.index'));
	}

	public function edit(Article $article): View
	{
		// Show a view to edit an existing resource

		return view('articles.edit', ['article' => $article]);
	}

	public function update(Article $article)
	{
		// Persist the edited resource

		$article->update($this->validateArticle());

		return redirect($article->path());
	}

	public function destroy($n): void
	{
		// Delete the resource
	}

	protected function validateArticle(): array
	{
		return request()->validate(
			[
				'title' => 'required',
				'excerpt' => 'required',
				'body' => 'required',
				'tags' => 'exists:tags,id',
			]
		);
	}
}
