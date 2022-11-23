<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        if (auth()->id() !== null) {
            return redirect(route('home'));
        }

        return view('welcome');
    }
}
