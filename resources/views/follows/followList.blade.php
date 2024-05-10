@extends('layouts.login')

@section('content')
<!-- フォローしている人のアイコンリスト -->
<div class=icon_list>
  <p>フォローリスト</p>
   @foreach($follow_users as $follow_user)
    <a href="{{route('user_profile',['id' => $follow_user->id ]) }}"><img src="{{ asset('storage/images/' . $follow_user->images) }}" alt="a" class=post_image></a>
   @endforeach
</div>
<ul>
  @foreach($follow_posts as $follow_post)
  <li class="post_list">
    <div class="post_date">
      <a href="{{route('user_profile',['id' => $follow_post->user->id ]) }}"><img src="{{ asset('storage/images/' . $follow_post->user->images) }}" alt="a" class="post_image"></a>
      <p class="username">{{ $follow_post->user->username}}</p>
      <p class="update">{{ $follow_post->updated_at}}</p>
    </div>
    <div class="post">{{ $follow_post->post}}</div>
  </li>
  @endforeach
</ul>


@endsection