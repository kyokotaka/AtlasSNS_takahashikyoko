
@extends('layouts.login')

@section('content')
  <div class="container">
    <!-- Laravel独自のフォームの書きかた -->
    {!! Form::open(['url' =>'/top']) !!}
    <!-- {{Form::token()}} -->
    @csrf
    <div class="form">
      {{ Form::input('text', 'new_post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) }}
    </div>
    <button type="submit" class="post_btn "><img src="/images/post.png"></button>
      {!! Form::close() !!}   
  </div>

    <ul>
      @foreach ($posts as $post)
      <li class="post_list">
        <div class="post_date">
          <img src="{{ asset('images/' . $post->user->images) }}" alt="icon_images" class=post_image>
          <p class="username">{{$post->user->username}}</p>
          <p class="update">{{$post->updated_at}}</p>
        </div>
        <div class="post">{!! nl2br(htmlspecialchars($post->post)) !!}</div>
        <div class="post_detail">
         @if (Auth::user()->id == $post->user_id)
          <a class="edit" href="" post="{{$post->post}}"post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集"></a>
          @csrf
          <a class="delete" href="/post/{{$post->id}}/top"onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="images/trash.png" alt="削除"></a>
          @csrf
         @endif
        </div>
      </li>
      @endforeach
    </ul>

    <div class="model_js-model">
      <div class="modal__bg js-modal-close">
        <div class="modal__content">
          <form action="/top" method="post">
            <input name="" class="modal_post">
              <input type="hidden" name="" class="modal_id" value="">
              <input type="submit" value="更新">
              {{ csrf_field() }}
          </form>
          <a class="js-modal-close" href="/top">閉じる</a>
        </div>
      </div>
    </div>

@endsection


