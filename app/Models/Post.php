<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 50, 50)
            ->nonQueued();
        $this
            ->addMediaConversion('header')
            ->fit(Manipulations::FIT_CROP, 800, 200)
            ->nonQueued();
    }
}
