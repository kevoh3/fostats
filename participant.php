<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class participant extends Model
{
    protected $table ='participants';
    protected $primaryKey ='participant_id';
    public function matche(){
        return $this->belongsTo('App\matche','match_id');
    }
    public function players(){
        return $this->belongsTo('App\players' ,'player_id');
    }


}
