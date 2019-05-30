<?php

namespace App;

use App\Models\StartupComment;
use App\Models\StartupFile;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = [
        'title', 'info', 'creater_id', 'logo', 'tagline', 'contacts',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'startup_user',
            'startup_id', 'user_id');
    }

    public function creater()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function files()
    {
        return $this->hasMany('App\Models\StartupFile');
    }

    public function comments()
    {
        return $this->hasMany(StartupComment::class)->orderBy('id','DECS');
    }

    public function professions()
    {
        return $this->belongsToMany('App\Models\Profession', 'startup_profession', 'startup_id', 'profession_id');
    }

//    public function userInStartup($id)
//    {
//        $users =
//        dd($users);
//        foreach ($users as $user)
//        {
//            dd($user);
////            if($user['id'] == $id){
////                return true;
////            }
//        }
////        return false;
//    }
}
