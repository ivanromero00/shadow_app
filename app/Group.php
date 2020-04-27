<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public function users()
    {
        return $this->belongsToMany('App\User')->orderBy('id', 'asc');
    }

    public function boards(){
        return $this->hasMany('App\Board')->orderBy('id', 'desc');
    }
}
