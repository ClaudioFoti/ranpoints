<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::with('author')->get();

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create(array_merge(["user_id" => auth()->id()], $request->validated()));

        return new PostResource($post);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
