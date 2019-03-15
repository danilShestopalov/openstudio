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
        return $this->hasMany(Comment::class);
    }

    /**
     * Get tags of post
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }
}
