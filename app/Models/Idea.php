<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = [
        'creator_id',
    ];

    /**
     * Get comment of post
     */
    public function comments()
    {
        return $this->hasMany(IComment::class);
    }

    /**
     * Get tags of post
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\ITag', 'idea_tag', 'idea_id', 'tag_id');
    }

    /**
     * Get users who like idea
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_like_idea',
            'idea_id', 'user_id');
    }
}
