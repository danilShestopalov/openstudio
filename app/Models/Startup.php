<?php

namespace App;

use App\Models\StartupComment;
use App\Models\StartupFile;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = [
        'title', 'urls', 'info', 'creater_id', 'logo', 'link', 'tagline',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'startup_user',
            'startup_id', 'user_id');
    }

    public function creater()
    {
        return $this->hasOne('App\Models\User');
    }

    public function files()
    {
        return $this->hasMany('App\Models\StartupFile');
    }

    public function comments()
    {
        return $this->hasMany(StartupComment::class);
    }
}
