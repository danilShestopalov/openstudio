<?php

namespace App;

use App\Models\StartupFile;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = [
        'title', 'urls', 'info', 'creater_id',
    ];

    public function profiles()
    {
        return $this->belongsToMany('App\Models\User', 'startup_profile',
            'startup_id', 'profile_id');
    }

    public function creater()
    {
        return $this->hasOne('App\Models\User');
    }

    public function files()
    {
        return $this->hasMany('App\Models\StartupFile');
    }
}
