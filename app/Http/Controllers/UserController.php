<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        ray($users);

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }
}
