<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function posts(){
        return $this ->hasMany('App\User');
    }
    protected $fillable = [
        'id','user_id','post','created_at','updated_at'
    ];
}
