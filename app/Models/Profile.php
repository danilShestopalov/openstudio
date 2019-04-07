<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'nickname', 'avatar', 'user_id', 'contacts', 'about', 'background',
    ];

    public function startups()
    {
        return $this->belongsToMany('App\Profile', 'startup_profile',
            'profile_id','startup_id');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\ProfileSkill', 'profile_skill', 'profile_id', 'skill_id');
    }

    public function professions()
    {
        return $this->belongsToMany('App\Models\ProfileProfession', 'profile_profession', 'profile_id', 'profession_id');
    }
}
