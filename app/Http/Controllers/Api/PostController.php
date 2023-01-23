<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
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
        $post = Post::create(array_merge(['user_id' => auth()->id()], $request->validated()));

        return new PostResource($post);
    }

    public function update(PostRequest $request, Post $post)
    {
        if (!auth()->user()?->is_admin) {
            return response()->json(["message" => "You do not have the permission to perform this action. Only an admin can."], 403);
        }

        $post->update(array_merge(['user_id' => auth()->id()], $request->validated()));

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $id = $post->id;

        if ($post->author->id !== auth()->id() && !auth()->user()?->is_admin) {
            return response()->json(["message" => "You are not allowed to delete this post. Only author or admin can."], 403);
        } else {
            if ($post->delete()) {
                return response()->json(["message" => "Successfully deleted post with id: $id."],204);
            } else {
                return response()->json(["message" => "The post with id: $id could not be deleted."], 503);
            }
        }
    }
}
