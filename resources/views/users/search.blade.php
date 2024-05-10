@extends('layouts.login')

@section('content')
<!-- //action→URLに表示される値のこと -->
<form method="post" action="/search">
  <!-- //csrfがないとURLにはてながつく -->
  @csrf
  <div id="search">
    <input type="text" name="keyword"  placeholder="ユーザー名">
      <button type="submit"  class="search_btn"><img src="/images/search.png" ></button>
        <!-- //$search_wordは変数にしてあるため、{}で囲むことでechoと同じ意味になり、表示できる -->
      <h3>{{$search_word}}</h3>
  </div>
</form>
  <!-- //繰り返し処理 -->
  <div class="search_user">
    @foreach($users as $user)
    <div class="user_detail">
      <img src="{{asset('images/'.$user->images)}}">
      <p class=search_username>{{$user->username}}</p>
      <!-- //postで送り、URLはweb.phpのルートfollow.idを通りデータベースに登録する。この時idは$idを通りデータベースに登録する。この時idは$userの中にあるidを持ってくる。 -->
      <!-- 現在ログインしているユーザが$userの中に入っているid(つまりクリックした人のid)がなかったらisFollowingメソッドを通りフォローするボタンになる -->
        @if(!auth()->user()->isFollowing($user->id))
          <form method="POST" action="{{route('follow',['id' => $user->id ]) }}">
           @csrf
           <button type="submit" class="btn btn-primary btn-sm" value="Submit">フォローする</button>
           <!-- <button type="submit" class="btn follow">フォロー</button> -->
          </form>
        @else
          <form method="POST" action="{{route('un_follow',['id' => $user->id ]) }}">
           @csrf
           <button type="submit" class="btn btn-danger btn-sm" value="submit">フォロー解除</button>
           <!-- <button type="submit" class="btn un_follow">フォロー解除</button> -->
          </form>
        @endif
    </div>
    @endforeach
  </div>  

@endsection