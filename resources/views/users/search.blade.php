@extends('layouts.login')

@section('content')
<!-- //action→URLに表示される値のこと -->
<form method="post" action="/search">
  <!-- //csrfがないとURLにはてながつく -->
  @csrf
  <div id="search">
    <input type="text" name="keyword"  placeholder="ユーザー名">
        <button type="submit" input type="image" src=""></button>
        <!-- //$search_wordは変数にしてあるため、{}で囲むことでechoと同じ意味になり、表示できる -->
        {{$search_word}}
  </div>
</form>
  <!-- //繰り返し処理 -->
  @foreach($users as $user)
  <!-- {$user} -->
    <tr>
      <!-- <td>{$user->icon}</td> -->
      <td>{{$user->username}}</td>
      <td></td>
      <!-- //postで送り、URLはweb.phpのルートfollow.idを通りデータベースに登録する。この時idは$idを通りデータベースに登録する。この時idは$userの中にあるidを持ってくる。 -->
      <form method="POST" action="{{route('follow',['id' => $user->id ]) }}">
      @csrf
      <button type="submit" class="btn  follow">フォロー</button></form>
    </tr>  
    
  @endforeach


@endsection