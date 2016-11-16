<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seasons extends Model
{

    protected $table = 'seasons';
    protected $primaryKey = 'season_id';
    public function matche()
    {
        return $this->hasMany('App\matche');
    }
public function Table(){
    return $this->hasMany('App\Table');
}
}
