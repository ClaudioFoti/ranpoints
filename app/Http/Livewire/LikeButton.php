<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PostUserController;
use App\Models\PostUser;
use Livewire\Component;

class LikeButton extends Component
{
    public $post_id;
    public $has_user_liked;
    public $likes;

    public $user_id;

    public function mount()
    {
        $this->user_id = auth()->user()->id;
    }

    public function like()
    {
        PostUserController::like($this->post_id, $this->user_id);

        $this->refreshLikes();
    }

    public function unlike()
    {
        PostUserController::unlike($this->post_id, $this->user_id);

        $this->refreshLikes();
    }

    public function refreshLikes()
    {
        $this->has_user_liked = PostUser::where('user_id', '=', $this->user_id)->where('post_id', '=', $this->post_id)->first() !== null;
        $this->likes = PostUser::where('post_id', '=', $this->post_id)->sum('weight');
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
