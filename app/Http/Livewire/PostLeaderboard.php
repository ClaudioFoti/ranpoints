<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostLeaderboard extends Component
{
    public $posts;

    protected $listeners = ['like' => '$refresh', 'unlike'=> '$refresh'];

    public function refreshPosts()
    {
        $posts = Post::with(['author', 'categories', 'children', 'interactions', 'media', 'author.profile'])->orderByDesc('created_at')->get();

        $posts = $posts->each(fn ($post) => $post->likes = $post->interactions->sum('weight'))->sortByDesc('likes');

        $this->posts = $posts->take(10);
    }

    public function render()
    {
        $this->refreshPosts();

        return view('livewire.post-leaderboard');
    }
}
