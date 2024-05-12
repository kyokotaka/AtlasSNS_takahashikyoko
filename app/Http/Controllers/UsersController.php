<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Register;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class UsersController extends Controller
{
    //ただ表示するだけのメソッド
    public function profile(User $user){
      return view('users.profile');
    }
    //Requestというインスタンスを使い、送られてきた情報を$requestとしてこの中では使うと宣言している
    public function update(Request $request){
      //dd($request);
      //バリデーションをかける変数。Validatorというインスタンスを通り$requestの中の情報全てを拾い上げ、このカラム名への制限はこれですよと宣言している
      $validator = Validator::make($request->all(),[
        'username' => ['required','min:2','max:12'],
        //'unique:users,mail,'.Auth::user()->mail.',mail'はusersテーブルのメールカラムの中から自分のメールアドレスだけは除くための記述。
        'mail' =>['required','min:5','max:40','email','unique:users,mail,'.Auth::user()->mail.',mail'],
        'password' =>['required','min:8','max:20','alpha-num',],
        'password_confirmation' =>['required','min:8','max:20','alpha-num',],
        'bio' =>['max:150',]
      ]);

      $user = Auth::user();
      $image=Auth::user()->images;
      if ($request->hasFile('images')){
      $image = $request->file('images')->store('public/images');
      }
      //dd(basename($image));
      $validator ->validate();
      $user->update([
        'username' => $request->input('username'),
        'mail' =>$request-> input('mail'),
        'password' =>bcrypt($request->input('password')),
        'bio'=>$request ->input('bio'),
        'images'=> basename($image),    ]);
      return redirect('/top');
    }
       // $auth = Auth::id();
        
    

    public function search(Request $request){
      //dd($request);
      //全てのユーザを取得
      // $all_user = Users::query();
      //キーワードを定義する
      $keyword = $request->input('keyword');

      // $query = User::all();テーブル全体から全てのレコード取得＊詳細設定できない。
      //$query = User::query();レコード取得。＊詳細設定可能。
      //$query = User::get();レコード取得。＊詳細設定可能。
      //もしキーワードが入っていたら。。。
      if(!empty($keyword))
      {
        //キーワードが入っていたら曖昧検索（where）をかけてgetで送る
        $search_word = '検索ワード'.$keyword;
        $users = User::where('username','like','%'.$keyword.'%')->get();
        //何も入っていなかったらユーザー全てを表示する
      }else{
        $search_word = "";
        $users = User::all()->except([\Auth::id()]);
      }
        //compactを使い対象のワードが入っていたときに対象のユーザーを配列する。'search_word','users'は上で定義した変数を渡している。
        return view('users.search',compact('search_word','users'));
    }

    
    public function new_follow($id){
      //引数として$idを使う。フォローされる方を呼び出す。
      //dd($id);
      //Auth::user()でフォローする方（自分）を定義する。
      $following_id = Auth::user();
      //$is_followingは自分がisFollowingの中で指定したユーザをフォローしているかを表す。
      //dd($following_id);
      $is_following = $following_id->isFollowing($id);
      //dd($is_following);
      //もし指定したユーザーをフォローしていなかったら指定したユーザーをアタッチする。
      if(!$is_following) {
      $following_id->following($id);
      }
      //dd($id);
      //Follow::create(['following_id'=>$following_id,'followed_id'=>$id]);
      //backにすることでそのページにいたままその機能が使える
      return back();
    }

    public function un_follow($id){
      // dd($id);
        $following_id = Auth::user();
        // フォローしているか
        $is_following = $following_id->isFollowing($id);
        //dd($is_following);
        //もしフォローしていたらデタッチする。
        if($is_following) {
        $following_id->unfollow($id);
            return back();
        }
       // dd($following_id);
      }
    
      public function userprofile($id){
        // dd($user);
         $other=User::where("id",$id)->first();
         //dd($other);
         $posts=Post::where("user_id",$id)->get();
         //dd($posts);
        return view('users.userprofile',compact('other','posts'));
      }
      
 }
