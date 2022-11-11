<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|min:5|max:255',
        ]);

        Post::create([
            'body' => $validated->body,
            'likes' => 0,
            'user_id' => 1,
            'parent_post_id' => null,
            'category_id' => null,
        ]);

        return redirect(route('posts.index'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $validated = $request->validate([
            'body' => 'required|min:5|max:255',
        ]);

        $post->update($validated);

        return redirect(route('posts.show', $id));
    }
}
