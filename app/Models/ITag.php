<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ITag extends Model
{
    protected $guarded = [
        'name'
    ];
    /**
     * Get tag's posts
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Idea', 'post_tag', 'tag_id', 'idea_id');
    }
}
