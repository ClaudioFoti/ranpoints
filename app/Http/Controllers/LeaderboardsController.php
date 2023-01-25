<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class LeaderboardsController extends Controller
{
    public function posts()
    {
        return view('leaderboards.posts');
    }

    public function users()
    {
        $users = User::with('interactions', 'posts', 'posts.media', 'posts.author', 'posts.author.profile')->whereHas('posts')->get();

        $users = $users->each(function ($user) {
            $user->posts->each(fn ($post) => $post->likes = $post->interactions->sum('weight'));
            $user->received = $user->posts->sum('likes');
        })->sortByDesc('received');

        return view('leaderboards.users', compact('users'));
    }
}
