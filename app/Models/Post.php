<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'creator_id',
    ];

    /**
     * Get comment of post
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    /**
     * Get tags of post
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\PostTag', 'posts_tags', 'post_id', 'tag_id');
    }
}
