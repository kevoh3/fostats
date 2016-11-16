<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    protected $table ='tests';
    protected $primaryKey ='test_id';
    public function matche(){
        return $this->belongsTo('App\matche','match_id');
}
}
