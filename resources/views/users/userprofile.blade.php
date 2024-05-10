@extends('layouts.login')

@section('content')

  <div class=other_user_profile> 
    <img src="{{asset('storage/images/'.$other->images)}}">
    <!-- <ul>
      <li class="other_username">ユーザー名</li>
      <li class="other_username">{{$other->username}}</li>
      <li class=other_user_bio>自己紹介</li>
      <li class="other_user_bio">{{$other->bio}}</li>
    </ul> -->
    <div class="other_user_name">
      <p class="other_name">ユーザー名</p>
      <p class="other_username">{{$other->username}}</p>
    </div>
    <div class="Other_bio">
      <p class=user_bio>自己紹介</p>
      <p class="other_user_bio">{{$other->bio}}</p>
    </div>
<!-- {dd($other)}} --> 
    @if(!auth()->user()->isFollowing($other->id))
      <form method="POST" action="{{route('follow',['id' => $other->id ]) }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">フォロー</button>
      </form>
    @else
      <form method="POST" action="{{route('un_follow',['id' => $other->id ]) }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">フォロー解除</button>
      </form>
    @endif
  </div>
  <ul>
    @foreach($posts as $post)
    <li class="other_user_detail">
      <div class="other_user_postlist">
         <img src="{{ asset('/storage/images/' . $post->user->images) }}" >
         <p class="other_name">{{$post->user->username}}</p>
         <p class="other_post">{{$post->post}}</p>
         <p class="other_update">{{$post->updated_at}}</p>
      </div>
    </li>
    @endforeach
  </ul>


@endsection