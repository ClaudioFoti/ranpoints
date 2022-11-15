<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with(['author', 'categories'])->get();

        return view('home', compact('posts'));
    }
}
