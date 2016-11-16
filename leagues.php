<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leagues extends Model
{
    protected $primaryKey='league_id';
    protected $table = 'leagues';
   // public static $table='leagues';
    public $timestamps = false;
    public function matche()
    {
        return $this->hasMany('App\matche');
    }
}
