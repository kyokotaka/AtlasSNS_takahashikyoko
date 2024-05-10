<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Follow;

class Follow extends Model
{
  public function follow_post(){
    return $this->hasMany('App\User');
  }
  public function post_follow(){
    return $this->belongsTo('App\Post');
  }

//   public function follow_count(Follow $follow){
    

}
