<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;


class PostsController extends Controller
{

    public function index(Request $request){
        //リード（読み込み）
        $view_posts = Post::get();
          if($request->isMethod('post')){
            $post = $request->input('posts');
            Posts::create([
              'user_id' => Auth::user()->id,
              'post' => $request ->post,]);
            }
            //if(Auth::attempt($post)){
              //return redirect('/top');
            return view('posts.index',['posts'=>$view_posts]);
          //}
       }
    public function create(Request $request){
        //$validator = Validator::make($post, [
            //'text' => ['required','max:150']]);
        //$validator->validate();
        $post = $request->input('new_post');
        //$postには＄requestの中のnew_postが入りますよ〜
        $user_id =Auth::user()->id;
        //user_idはAuthの中のuserからidをとった変数だよ
        Post::create([
            'post' => $post,
            'user_id' => $user_id,
        ]);
        return redirect('/top');
    }

///パラメータ付ルーティングによる編集機能（アップデート）
    public function edit($post){
      Post::where('post',$post)->first();
         
        return redirect('/top');
      }

    public function delete($id){
      //dd($post);
      //Postのidカラムから$idで入っている値を抜き出して消している。
      Post::where('id',$id)->delete();

      return redirect('/top');
    }



}