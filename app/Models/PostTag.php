<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $guarded = [
        'name'
    ];


    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'posts_tags', 'tag_id', 'post_id');
    }
}
