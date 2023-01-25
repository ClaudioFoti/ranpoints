<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('posts', 'posts.media', 'posts.author', 'posts.author.profile')->find($id);

        return view('users.show', compact('user'));
    }
}
