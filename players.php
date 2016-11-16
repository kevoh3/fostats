<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class players extends Model
{
    protected $table = 'players';
    public $timestamps = true;
    protected $primaryKey = 'player_id';

    public function matche(){
        return $this->belongsToMany('App\matche','match_players','player_id','match_id');

    }
    public function game(){
        return $this->belongsToMany('App\game','game_players','player_id','game_id');

    }
}
