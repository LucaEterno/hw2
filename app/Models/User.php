<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function follows() 
    {
        return $this->belongsToMany('App\Models\Event', 'follows');
    }

    public function track() 
    {
        return $this->hasMany('App\Models\Track');
    }
}