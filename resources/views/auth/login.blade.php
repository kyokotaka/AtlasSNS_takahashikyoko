@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<section>
<p class="heading">AtlasSNSへようこそ</p>
<!-- </section> -->
<div class="text_area">
{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}</p>
{{ Form::label('password') }}</p>
{{ Form::password('password',['class' => 'input']) }}</p>
</div>
{{ Form::submit('ログイン') }}
</section>
<p class="new_user"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
