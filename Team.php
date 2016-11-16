<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table ='teams';
    protected $primaryKey ='team_id';
    public function matche()
    {
        return $this->belongsToMany('App\matche','matche_team','team_id','match_id');
    }
    public function Table(){
        return $this->belongsTo('App\Table','table_id');
    }
    public function game(){
        return $this->belongsToMany('App\game','game_team','team_id','game_id');
    }
}
