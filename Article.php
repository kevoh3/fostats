<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $primaryKey='article_id';
    protected $table = 'articles';
    public $timestamps = true;
    public function comment()
    {
        return $this->hasMany('App\comment');
    }
}
