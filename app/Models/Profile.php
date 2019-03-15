<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function startups()
    {
        return $this->belongsToMany('App\Profile', 'startup_profile',
            'profile_id','startup_id');
    }

    public function saveProfile($data, $imageName)
    {
        $this->user_id = auth()->user()->id;
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->info = $data['info'];
        $this->urls = $data['urls'];
        $this->image = $imageName;
        $this->save();
    }
    public function updateProfile($data, $imageName)
    {
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->info = $data['info'];
        $this->urls = $data['urls'];
        $this->image = $imageName;
        $this->update();
    }
}
