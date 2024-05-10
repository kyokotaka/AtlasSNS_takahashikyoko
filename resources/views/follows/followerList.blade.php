@extends('layouts.login')

@section('content')
<!-- フォロワーのアイコンリスト -->
<div class=icon_list>
  <p>フォロワーリスト</p>
   @foreach($follower_users as $follower_user)
    <a href="{{route('user_profile',['id' => $follower_user->id ]) }}"><img src="{{ asset('storage/images/' . $follower_user->images) }}" alt="{{ $follower_user->username }}"></a>
   @endforeach
</div>
<ul>
  @foreach($follower_posts as $follower_post)
  <li class="post_list">
   <div class="post_date">
    <a href="{{route('user_profile',['id' => $follower_user->id ]) }}"><img src="{{ asset('storage/images/' . $follower_post->user->images) }}" alt="" class=post_image></a>
    <p class="username">{{ $follower_post->user->username}}</p>
    <p class="update">{{ $follower_post->updated_at}}</p>
   </div>
   <div class="post">{{ $follower_post->post}}</div>
  </li>
  @endforeach
</ul>
@endsection