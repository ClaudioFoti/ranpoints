<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'categories'])->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function create(Request $request)
    {
        if ($request->parent_post_id !== null) {
            $validated = $request->validate([
                'parent_post_id' => ['integer'],
            ]);

            return view('posts.create', ['parent_post_id' => $validated['parent_post_id']]);
        }

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => ['required', 'min:5', 'max:255'],
            'image' => ['nullable', 'file'],
            'parent_post_id' => ['nullable', 'integer'],
        ]);

        $post = Post::create([
            'body' => $validated['body'],
            'user_id' => auth()->user()->id,
            'parent_post_id' => $validated['parent_post_id'],
        ]);

        $validated = $request->validate([
            'image' => ['nullable', 'file', 'image'],
        ]);

        if ($request->has('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection();
        }

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
            'body' => ['required', 'min:5', 'max:255'],
        ]);

        $post->update($validated);

        return redirect(route('posts.show', $id));
    }
}
