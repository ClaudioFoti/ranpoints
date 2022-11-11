<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent_post()
    {
        return $this->belongsTo(Post::class, 'parent_post_id');
    }

    public function children()
    {
        return $this->hasMany(Post::class, 'parent_post_id');
    }
}
