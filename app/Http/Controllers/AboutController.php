<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
	public function show(): View
	{
		$articles = Article::take(3)
			->latest('created_at')
			->get();

		return view(
			'about',
			[
				'articles' => $articles,
			]
		);
	}
}