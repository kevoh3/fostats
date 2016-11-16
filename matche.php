<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matche extends Model
{
    protected $table ='Matche_tables';
    protected $primaryKey ='match_id';
    public function leagues(){
        return $this->belongsTo('App\leagues','league_id');
    }

    public function Venues(){
        return $this->belongsTo('App\Venues','venue_id');
    }
    public function test(){
        return $this->hasOne('App\test','test_id');
    }
    public function participant(){
        return $this->hasOne('App\participant','participant_id');
    }
    public function players()
    {
        return $this->belongsToMany('App\players', 'match_players','match_id','player_id');
    }
    public function Team()
    {
        return $this->belongsToMany('App\Team','matche_team','match_id','team_id');
    }
    public function seasons(){
        return $this->belongsTo('App\seasons','season_id');
}
   public function Tim(){
       return $this->hasMany('App\Tim','tim_id');
          }
}
