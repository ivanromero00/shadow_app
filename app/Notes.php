<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';

    public function board(){
        return $this->hasOne('App\Board');
    }
}
