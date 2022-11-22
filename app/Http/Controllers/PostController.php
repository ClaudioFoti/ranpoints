<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'categories', 'interactions', 'author.profile', 'media', 'children'])->orderByDesc('created_at')->get();

        return view('posts.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post = Post::find($id);

        $withParameters = ['categories', 'children', 'interactions', 'media', 'author.profile'];

        if ($post->parent_post_id !== null) {
            array_push($withParameters, 'parent_post', 'parent_post.author', 'parent_post.media', 'parent_post.author.profile');
        }

        if (!$post->children->isEmpty()) {
            array_push($withParameters, 'children.author', 'children.media', 'children.interactions', 'children.author.profile');
        }

        $post = Post::with($withParameters)->find($id);

        return view('posts.show', compact('post'));
    }

    public function create(Request $request)
    {
        $has_parent = false;

        if ($request->parent_post_id !== null) {
            $validated = $request->validate([
                'parent_post_id' => ['integer'],
            ]);

            $has_parent = true;

            $parent_post = Post::with('author', 'media', 'author.profile')->find($validated['parent_post_id']);

            return view('posts.create', compact('parent_post'), compact('has_parent'));
        }

        return view('posts.create', compact('has_parent'));
    }

    public function store(Request $request)
    {
        //Post
        $validated = $request->validate([
            'body' => ['required', 'min:5', 'max:255'],
            'parent_post_id' => ['nullable', 'integer'],
        ]);

        $post = Post::create([
            'body' => $validated['body'],
            'user_id' => auth()->id(),
            'parent_post_id' => $validated['parent_post_id'],
        ]);

        //Categories and Image
        $this->addExtraData($request, $post);

        return redirect(route('posts.index'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request)
    {
        //Post
        $post = Post::find($id);

        $validated = $request->validate([
            'body' => ['required', 'min:5', 'max:255'],
        ]);

        $post->update($validated);

        //Categories and Image
        $this->addExtraData($request, $post);

        return redirect(route('posts.show', $id));
    }

    /**
     * @param Request $request
     * @param $post
     * @return void
     */
    public function addExtraData(Request $request, $post): void
    {
        //Categories
        $validated = $request->validate([
            'categories' => ['nullable', 'string'],
        ]);

        $categories = collect(explode(',', $validated['categories']))->map(fn($k) => ucfirst(trim($k)));

        $category_list = [];
        foreach ($categories as $category) {
            if ($category !== '' && $category !== ' ') {
                $category_list[] = \App\Models\Category::firstOrCreate(['name' => $category]);
            }
        }
        $category_list = collect($category_list);

        $post->categories()->sync($category_list->pluck('id'));

        //Image
        $validated = $request->validate([
            'image' => ['nullable', 'file', 'image'],
        ]);

        if ($request->has('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection();
        }
    }
}
