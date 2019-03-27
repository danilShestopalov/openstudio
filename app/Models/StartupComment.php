<?php

namespace App\Models;

use App\Startup;
use Illuminate\Database\Eloquent\Model;

class StartupComment extends Model
{
    protected $fillable = [
        'body', 'creator_id', 'startup_id', 'likes',
    ];

    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
