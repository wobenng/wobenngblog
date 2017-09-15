<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twohtmlarticle extends Model
{
    protected $fillable = [ 'title'];
   public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
