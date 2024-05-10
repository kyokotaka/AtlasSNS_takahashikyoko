<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','images','bio'
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
  public function follows(){
    return $this->belongsToMany('App\User','follows','following_id','followed_id');
  }  
  //フォローされる方のリレーション
  public function follower(){
    return $this->belongsToMany('App\User','follows','followed_id','following_id');
  }
  //followsテーブルに$user_id（フォローしたい方のid）を登録する
  public function following(Int $user_id){
    return $this->follows()->attach($user_id);
  }
  //followsテーブルの$user_idを削除する
  public function unfollow(Int $user_id){
    return $this->follows()->detach($user_id);
  }
  //特定のユーザーをフォローしているかどうか。$user_idが、現在のユーザーがフォローしているユーザーの中に含まれているかを調べる。$user_idを持つレコードが、現在のユーザーがフォローしているユーザーの中に存在する場合、そのレコードを返します。存在しない場合は何も返しません。
  public function isFollowing($user_id){
   //dd($user_id);
    //followsテーブルのfollowed_idカラムに$user_idを入れる。この時、followsテーブルに入ったidを持ってきますよと宣言している
    return (bool)$this->follows()->where('followed_id',$user_id)->first(['follows.id']);
  }
  //フォローされているかどうか。
  public function isFollowed($user_id){
  //followsテーブルのfollowed_idカラムに$user_idを入れる
    return (bool)$this->follows()->where('following_id', $user_id)->first(['follows.id']);
  }

  public function user_post(){
    return $this->belongsTo('App\Follows');
  }

  public function posts(){
    return $this->hasMany('App\Post');
  }
  
  // public function follow_count(){
    
  //指定されたuser_idがfollowing_idにいくつ入っているのかを探すメソッド
  //   return $this->where('following_id', Auth::user())->count();
  // }

  // public function follower_count($user_id){
  //     指定されたuser_idがfollowed_idにいくつ入っているのかを探すメソッド
  //     return $this->where('followed_id', $user_id)->count();
    //この表記だとレイアウトの画面にしか反映されずインデックスの画面には反映されないためポストが消えてしまう
    //return view('layouts.login',['count'=>$count]);
  

  
}


