@extends('layouts.login')

@section('content')



<form action="{{ url('/profile') }}" enctype="multipart/form-data" method="post">
  @csrf
  @if ($errors->any())
      
   @endif
  <dl class="UserProfile">
    
    <dt>ユーザー名</dt>
    <dd><input type="text" name="username" minlength="4"maxlength="12" value="{{auth()->user()->username}}"></dd>
    <dt>メールアドレス</dt>
    <dd><input type="email" name="mail" minlength="5"maxlength="40" value="{{auth()->user()->mail}}"></dd>
    <dt>パスワード</dt>
    <dd><input type="password" name="password" minlength="8"maxlength="20" value=""></dd>
    <dt>パスワード確認</dt>
    <dd><input type="password" name="password_confirmation"minlength="8"maxlength="20" value=""></dd>
    <dt>自己紹介</dt>
    <dd><input type="text" name="bio" value="{{auth()->user()->bio}}"></dd>
    <dt>アイコン画像</dt>
    <input type="file" name="images" accept="image/png, image/jpeg image/bmp image/gif image/svg"></dd>
  </dl>
  <input type="submit" name="profileupdate" value="更新">
</form>


@endsection