<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with(['author', 'categories', 'interactions', 'author.profile', 'media', 'children'])->orderByDesc('created_at')->get();

        return view('home', compact('posts'));
    }
}
