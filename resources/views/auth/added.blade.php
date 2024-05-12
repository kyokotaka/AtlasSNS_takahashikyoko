@extends('layouts.logout')

@section('content')

<div id="clear">
  <p class="heading">{{$username}}さん</p>
  <div class="form_add">
    <p>ようこそ！AtlasSNSへ！</p>
    <p class=add_ok>ユーザー登録が完了しました。</p>
    <p class>早速ログインをしてみましょう。</p>
  </div>
  <div class="text-center">
    <!-- <input class="btn btn-danger btn-sm" type="submit" value="ログイン画面へ"> -->
    <a href="/login" class="btn btn-danger btn-sm" tabindex="-1" role="button" aria-disabled="true">ログイン画面へ</a>
  </div>  
  <!-- <a href="/login">ログイン画面へ</a></p> -->
</div>

@endsection