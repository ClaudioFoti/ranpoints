<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class LeaderboardsController extends Controller
{
    public function posts()
    {
        $posts = Post::with(['author', 'categories', 'children', 'interactions', 'media', 'author.profile'])->orderByDesc('created_at')->get();

        $posts = $posts->each(fn ($post) => $post->likes = $post->interactions->sum('weight'))->sortByDesc('likes');

        $posts = $posts->take(10);

        return view('leaderboards.posts', compact('posts'));
    }

    public function users()
    {
        $users = User::with('interactions', 'posts', 'posts.media', 'posts.author', 'posts.author.profile')->get();

        $users = $users->each(function ($user) {
            $user->posts->each(fn ($post) => $post->likes = $post->interactions->sum('weight'));
            $user->received = $user->posts->sum('likes');
        })->sortByDesc('received');

        return view('leaderboards.users', compact('users'));
    }
}
