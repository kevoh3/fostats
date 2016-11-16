<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table ='tims';
    protected $primaryKey ='tim_id';
    public function matche()
    {
        return $this->belongsToMany('App\matche');
    }
}
