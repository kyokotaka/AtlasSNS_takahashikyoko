<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="AtlasSNS" />
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!--js-->
    <script src="/app.js"></script>
    <script src = js/app.js></script>
  </head>
  <body>
    <header>
        <div id = "head">
          <a href="/top"><img src="images/atlas.png" ></a>
        </div>
        <p class="user_name">{{Auth::user()->username}}さん</p>
           <div class="accordion_container"></div>
           <button type="button" class="menu-btn">
             <span class="inn"></span>
           </button>
            <ul class="menu">
              <li><a href="/top">ホーム</a></li>
              <li><a href="/profile">プロフィール</a></li>
              <li><a href="/logout">ログアウト</a></li>
            </ul>
        <div class="icon">
          <img src="images/icon1.png" alt="aa">
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div class="count">
                  <p>フォロー数</p>
                  <!-- ログインしているユーザーがフォローしている人を持ってくる。なので、フォローしている人のリレーションを使うことで自分のIDをカウントできる -->
                  <p>{{Auth::user()->follows()->count()}}名</p>
                </div>
                  <a class="btn btn-primary btn-sm" href="/followList" role="button">フォローリスト</a>
                <div class="count">
                  <p>フォロワー数</p>
                  <!-- ログインしているユーザーをフォローしている人を持ってくる。なので、フォローされている人のリレーションを使うことで自分のIDをカウントできる -->
                  <p>{{Auth::user()->follower()->count()}}名</p>
                </div>
                <a class="btn btn-primary btn-sm" href="/followerList" role="button">フォロワーリスト</a>
            </div>
            <div id="user_search_btn">
              <a class="btn btn-primary btn-sm" href="/search" role="button">ユーザー検索</a>
            </div>
        </div>
    </div>
    <footer>
    </footer>
  </body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
       integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
       crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
       integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
       crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
       integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
       crossorigin="anonymous"></script>
</html>
