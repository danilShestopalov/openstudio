<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'nickname', 'avatar', 'user_id', 'contacts', 'about', 'background',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\ProfileSkill', 'profile_skill', 'profile_id', 'skill_id');
    }

    public function professions()
    {
        return $this->belongsToMany('App\Models\Profession', 'profile_profession', 'profile_id', 'profession_id');
    }
}
