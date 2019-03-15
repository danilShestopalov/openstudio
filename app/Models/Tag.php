<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [
        'name'
    ];
    /**
     * Get tag's posts
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_tag', 'tag_id', 'post_id');
    }
}
