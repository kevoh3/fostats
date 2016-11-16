<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey='comment_id';
    protected $table = 'comments';
    // public static $table='leagues';
    public $timestamps = false;
    public function Article()
    {
        return $this->belongsTo('App\Article');
    }
}
