<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cssarticle extends Model
{
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    } 
}
