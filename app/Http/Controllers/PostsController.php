<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function show(string $slug)
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
