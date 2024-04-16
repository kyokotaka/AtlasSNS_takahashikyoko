
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
    <button type="submit" class="post_btn ">投稿</button>
      {!! Form::close() !!}   
  </div>

      
    </form>
   
  </div>
  <table class="post table">
      @foreach ($posts as $post)
          <tr>
           <td>{{$post->user_id}}</td>
           <td>{{$post->post}}</td>
           <td><a class="btn edit" href="/post/{{$post->id}}/top">編集</a></td>
           <td><a class="btn delete" href="/post/{{$post->id}}/top"onclick="return confirm('この投稿を削除します。よろしいですか？')">削除</a></td>
          </tr>
      @endforeach
</table>

</div>
    


@endsection