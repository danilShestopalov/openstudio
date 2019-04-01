<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'comment', 'creator_id', 'post_id'
    ];
    /**
     * Get comment's post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
