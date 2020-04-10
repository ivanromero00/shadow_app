<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

    public function group(){
        return $this->hasOne('App\Group');
    }

    public function notes(){
        return $this->hasMany('App\Notes')->orderBy('id','desc');
    }
}
