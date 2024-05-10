@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/login']) !!}
  <div class="form">
   <p class="heading">AtlasSNSへようこそ</p>
 <!-- </section> -->
    <div class="text_area">
      {{ Form::label('メールアドレス') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
      {{ Form::label('パスワード') }}
      {{ Form::password('password',['class' => 'input']) }}
    </div>
    <div class="text-right">
    <input class="btn btn-danger btn-sm" type="submit" value="ログイン">
<!-- { Form::submit('ログイン',['class' => 'btn btn-danger']) } -->
    </div>
    <p class="new_user"><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
{!! Form::close() !!}

@endsection
