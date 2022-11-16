<?php

namespace App\Http\Controllers;

use App\Models\PostUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $validated = $request->validate([
            'post_id' => 'required|integer',
        ]);

        $post_id = $validated['post_id'];

        $post_user_query = PostUser::where('user_id', '=', $user_id)->where('post_id', '=', $post_id);

        if ($post_user_query->count() === 0) {
            if ($post_user_query->withTrashed()->count() === 0) {
                PostUser::create([
                    'post_id' => $post_id,
                    'user_id' => $user_id,
                    'weight' => random_int(1, 5),
                ]);
            } else {
                $post_user_query->withTrashed()->restore();
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post_id
     * @return RedirectResponse
     */
    public function destroy($post_id)
    {
        $user_id = auth()->user()->id;

        PostUser::where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->delete();

        return redirect()->back();
    }
}
