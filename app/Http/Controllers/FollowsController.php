<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //フォローしている
    public function followList(User $user){
        
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
