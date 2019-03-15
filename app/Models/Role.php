<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permission', 'permission_id', 'role_id');
    }
}
