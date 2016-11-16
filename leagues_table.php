<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class leagues_table extends Model
{
    protected $table = 'leagues_table'; //
    public $timestamps = true;

    public function matches(){
        return $this->hasMany('App\matche');
    }
}
