<?php

namespace App\Models;

use App\Models\IComment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function commentsIdea()
    {
        return $this->hasMany(IComment::class);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

    public function hasRole($check)
    {
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    }

    public function favoriteStartups()
    {
        return $this->belongsToMany('App\Startup', 'startup_profile',
            'profile_id', 'startup_id');
    }
}
