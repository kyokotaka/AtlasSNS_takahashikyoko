<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Register;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;


class UsersController extends Controller
{
    //
    
    public function profile(Request $request)
    {
        $auth = Auth::id();
        $validated =$request->validate([
        'username' => ['required','min:2','max:12',],
            'mail' =>['required','min:5','max:40','unique:users,mail,.Auth::()->mail.','email',],
            'password' =>['required','min:8','max:20','alpha-num',],
            'password_confirmation' =>['required','min:8','max:20','alpha-num',]
        
          ]);    
          return view('users.profile');
    }

    public function search(Request $request){
      //dd($request);
      //全てのユーザを取得
      // $all_user = Users::query();
      //キーワードを定義する
      $keyword = $request->input('keyword');
      $query = User::query();

      //もしキーワードが入っていたら。。。
      if(!empty($keyword))
      
      {
        //キーワードが入っていたら曖昧検索（where）をかけてgetで送る
        $search_word = '検索ワード'.$keyword;
        $users = $query->where('username','like','%'.$keyword.'%')->get();
        //何も入っていなかったらユーザー全てを表示する
      }else{
        $search_word = "";
        $users = User::all();
      }
        //compactを使い対象のワードが入っていたときに対象のユーザーを配列する
        return view('users.search',compact('search_word','users'));
    }


    public function new_follow(User $id){
      dd($id);
      //Follows::where('following_id',$id)
      $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
      }
    // public function user_list(){
    //    return view('users.search');
    // }
    //public function(){

    //}
 }