@extends('layouts.logout')

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
        {{ Form::text('password',null,['class' => 'input']) }}
        {{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}
      </div>
      <div class="text-right">
        <input class="btn btn-danger btn-sm" type="submit" value="新規登録">
      </div>
    <p><a href="/login">ログイン画面へ戻る</a></p>
  </div>
{!! Form::close() !!}

@endsection
