<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StartupFile extends Model
{
    protected $fillable = ['name','startup_id'];



    public $timestamps = false;
}
