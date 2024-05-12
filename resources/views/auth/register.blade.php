@extends('layouts.logout')
@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
  <div class="form_register">
     <p class="heading">新規ユーザー登録</p>
      <div class="text_area">
        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}
        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        {{ Form::label('パスワード') }}
        {{ Form::password('password',null,['class' => 'input']) }}
        {{ Form::label('パスワード確認') }}
        {{ Form::password('password_confirmation',null,['class' => 'input']) }}
      </div>
      <div class="text-right">
        <input class="btn btn-danger btn-sm" type="submit" value="新規登録">
      </div>
    <p class="back_login"><a href="/login">ログイン画面へ戻る</a></p>
  </div>
{!! Form::close() !!}

@endsection
