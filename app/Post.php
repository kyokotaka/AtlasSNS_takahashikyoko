<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Post extends Model
{

    protected $fillable = [
        'id','user_id','post','created_at','updated_at'
    ];

    public function user(){
        return $this ->belongsTo('App\User');
    }
    public function follow_post(){
        return $this ->hasMany('App\Follow');
    }

}
