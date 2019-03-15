<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class IComment extends Model
{
    protected $fillable = [
        'body', 'creator_id', 'idea_id'
    ];
    /**
     * Get comment's post
     */
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
