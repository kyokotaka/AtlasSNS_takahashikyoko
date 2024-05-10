
@extends('layouts.login')

@section('content')
    <!-- Laravel独自のフォームの書きかた -->
    {!! Form::open(['url' =>'/top','class'=>'index_container']) !!}

    @csrf
    <img src="{{ asset('/storage/images/' . Auth::user()->images) }}" alt="aa" class="post_user_image">
    {{ Form::textarea('new_post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) }}

    <button type="submit" class="post_btn "><img src="/images/post.png"></button>
      {!! Form::close() !!}   


    <ul>
      @foreach ($posts as $post)
      <li class="post_list">
        <div class="post_date">
          <img src="{{ asset('storage/images/' . $post->user->images) }}" alt="icon_images" class=post_image>
          <p class="username">{{$post->user->username}}</p>
          <p class="update">{{$post->updated_at}}</p>
        </div>
        <div class="post">{!! nl2br(htmlspecialchars($post->post)) !!}</div>
        <div class="post_detail">
         @if (Auth::user()->id == $post->user_id)
          <a class="edit js-modal-open" href="" post="{{$post->post}}"post_id="{{ $post->id }}"value="{{$post->post}}"><img src="images/edit.png" alt="編集"></a>
          @csrf
          <a class="delete" href="/post/{{$post->id}}/top"onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="images/trash.png" alt="削除" img onMouseOver="this.src='images/trash-h.png'" onMouseOut="this.src='images/trash.png'"></a>
          @csrf
         @endif
        </div>
      </li>
      @endforeach
    </ul>

    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="/post/{{$post->id}}/top" method="post">
          <textarea name="Edit_post" class="modal_post" value=""></textarea>
              <input type="hidden" name="id" class="modal_id" value="">
              <a type="submit" ><img src="images/edit.png" alt="編集"></a>
              {{ csrf_field() }}
          </form>
        </div>
    </div>

@endsection


