<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with(['author', 'categories', 'children', 'interactions', 'media', 'author.profile'])->orderByDesc('created_at')->get();

        return view('home', compact('posts'));
    }
}
