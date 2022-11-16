<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'likes', 'user_id', 'parent_post_id', 'category_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent_post()
    {
        return $this->belongsTo(Post::class, 'parent_post_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Post::class, 'parent_post_id');
    }

    public function interactions()
    {
        return $this->hasMany(PostUser::class);
    }

    public function hasUserLiked()
    {
        return ! $this->interactions->filter(fn ($interaction) => $interaction->user_id === auth()->user()->id)->isEmpty();
    }
}
