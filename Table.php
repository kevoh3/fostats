<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'Table';
    protected $primaryKey = 'table_id';

    public function seasons()
    {
        return $this->belongsTo('App\seasons', 'season_id');
    }
    public function Team(){
        return $this->hasMany('App\Team','team_id');
    }
}