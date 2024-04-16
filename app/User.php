<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


  //フォローするためのリレーション
  public function follow(){
    return $this->belongToMany('App\User','follows','following_id','followed_id');
  }  
  //フォローされる方のリレーション
  public function follower(){
    return $this->belongToMany('App\User','follows','followed_id','following_id');
  }
  //followsテーブルに$user_idを登録する
  public function following(){
    return $this->follows()->attach($user_id);
  }
  //followsテーブルの$user_idを削除する
  public function unfollow(){
    return $this->follows()->detach($user_id);
  }
  //特定のユーザーをフォローしているかどうか。$user_idが、現在のユーザーがフォローしているユーザーの中に含まれているかを調べる。$user_idを持つレコードが、現在のユーザーがフォローしているユーザーの中に存在する場合、そのレコードを返します。存在しない場合は何も返しません。
  public function isFollowing($user_id){
    return $this->follows()->where('following_id',$user_id);
  }
}


