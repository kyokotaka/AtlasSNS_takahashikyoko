<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{

    public function index(Request $request){
        //リード（読み込み）
        $view_posts = Post::all();
         //dd($view_posts);
          // if($request->isMethod('post')){
          //   $post = $request->input('posts');
          //   Posts::create([
          //     'user_id' => Auth::user()->id,
          //     'post' => $request ->post,]);
          //   }
            //if(Auth::attempt($post)){
              //return redirect('/top');
            return view('posts.index',['posts'=>$view_posts]);
          }
      //  }

      
    public function create(Request $request){
      $request->validate([
        'new_post' => 'required|string|max:150',]);
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
    public function edit(Request $request){
      //dd($request);
      $id=$request->input('id');
      $edit_post=$request->input('Edit_post');

      Post::where('id',$id)->update([
        'post'=>$edit_post
      ]);
         
        return redirect('/top');
      }

    public function delete($id){
      //dd($id);
      //Postのidカラムから$idで入っている値を抜き出して消している。
      Post::where('id',$id)->delete();

      return redirect('/top');
    }

    // public function other_post($id){
    //   $post=Post::where('user_id',$id)->first();
    //   //dd($post);
    //   return view('users.userprofile',['posts'=>$post]);
    // }


}