<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)->first();

        return view(
            'post',
            [
                'post' => $post,
            ]
        );
    }
}
