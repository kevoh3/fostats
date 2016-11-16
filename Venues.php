<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venues extends Model
{
    protected $table = 'venue';
    protected $primaryKey='venue_id';
            public $timestamps = false;
    public function matche()
    {
        return $this->hasMany('App\matche');
    }

}
