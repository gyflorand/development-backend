<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{
    public function show($post)
    {
        $posts = [
            'my-first-post' => 'Hello,there is my first blog post!',
            'my-second-post' => 'Now I getting a hang of this blogging thing.',
        ];

        if (! array_key_exists($post, $posts)) {
            abort(404, "Post wasn't found.");
        }

        return view(
            'post',
            [
                'name' => request('name'),
                'post' => $posts[$post],
            ]
        );
    }
}
