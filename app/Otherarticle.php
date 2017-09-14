<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otherarticle extends Model
{
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
