<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $table ='games';
    protected $primaryKey ='game_id';
    public function players()
    {
        return $this->belongsToMany('App\players', 'games_players','game_id','player_id');
    }
    public function Team()
    {
        return $this->belongsToMany('App\Team','games_teams','game_id','team_id');
    }
}
