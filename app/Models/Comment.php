<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body', 'creator_id', 'post_id'
    ];
    /**
     * Get comment's post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
