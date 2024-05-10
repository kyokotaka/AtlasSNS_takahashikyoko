<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
  
  public function follow_count(Follow $follow){ 
    $user = Auth::user();
    //dd($user);
    return view('index', ['user' => $user]);
  }
  
  
  
  public function followerList(){
    //
    $following =Auth::user();
    $follower_users = $following->follower()->get();
    $follower_posts = Post::query()->whereIn('user_id', Auth::user()->follower()->pluck('following_id'))->latest()->get();
    //dd($follower_posts);
    return view('follows.followerList',compact('follower_users','follower_posts'));
  }

  //フォローしている
  public function followList(){
    $following =Auth::user();
    $follow_users = $following->follows()->get();
    $follow_posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
  return view('follows.followList',compact('follow_users','follow_posts'));
  }


}
