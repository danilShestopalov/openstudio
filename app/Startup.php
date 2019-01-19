<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $fillable = [
        'title', 'urls', 'info',
    ];

    public function profiles()
    {
        return $this->belongsToMany('App\User', 'startup_profile',
            'startup_id', 'profile_id');
    }

    public function creater()
    {
        return $this->hasOne('App\User');
    }

    public function saveStartup($data, $imageName)
    {
        $this->creater_id = auth()->user()->id;
        $this->title = $data['title'];
        $this->info = $data['info'];
        $this->urls = $data['urls'];
        $this->startup_image = $imageName;
        $this->save();
    }
    public function updateProfile($data, $imageName)
    {
        $this->title = $data['title'];
        $this->info = $data['info'];
        $this->urls = $data['urls'];
        $this->startup_image = $imageName;
        $this->update();
    }
}
