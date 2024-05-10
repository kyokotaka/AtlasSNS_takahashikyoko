@extends('layouts.login')

@section('content')



<form action="/update"  method="post" enctype="multipart/form-data">
  @csrf
  @if ($errors->any())
      
   @endif
  <div class="UserProfile">
  <img src="{{ asset('/storage/images/' . Auth::user()->images) }}" alt="aa">
  <ul>
    <li class="new_name">
    <label>ユーザー名</label>
    <!-- minlength="4"maxlength="12"はバリデーション的なもの。 -->
    <!-- valueでログイン中のユーザーの中から名前を抜き出している。 -->
    <input type="text" name="username" minlength="4"maxlength="12" value="{{auth()->user()->username}}"></li>
    <li class="new_mail">
    <label>メールアドレス</label>
    <input type="email" name="mail" minlength="5"maxlength="40" value="{{auth()->user()->mail}}"></li>
    <li class="new_pass">
    <label>パスワード</label>
    <input type="password" name="password" minlength="8"maxlength="20" ></li>
    <li class="new_pass_con">
    <label>パスワード確認</label>
    <input type="password" name="password_confirmation"minlength="8"maxlength="20" ></li>
    <li class="new_bio">
    <label>自己紹介</label>
    <input type="text" name="bio" value="{{auth()->user()->bio}}"></dd>
    <li class="new_icon">
    <label>アイコン画像</label>
    <input type="file" name="images" accept="image/png, image/jpeg, image/bmp, image/gif, image/svg"></li>
  </ul>
  </div>
  <div class="profile_edit">
    <input type="submit" name="profileupdate" class="btn btn-danger" value="更新">
    <!-- <button type="button" class="btn btn-danger">更新</button> -->
  </div>
    @csrf
 
</form>


@endsection