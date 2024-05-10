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
    <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?> ">
    
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
          <a href="/top"><img src="../images/atlas.png" ></a>
        </div>
        <div class="name">
          <p class="user_name"><?php echo e(Auth::user()->username); ?>さん</p>
        </div>
        <button type="button" class="menu-btn">
          <span class="inn"></span>
        </button>
 
            <nav class="menu">
              <ul>
                <li><a href="/top">ホーム</a></li>
                <li><a href="/profile">プロフィール</a></li>
                <li><a href="/logout">ログアウト</a></li>
              </ul>
            </nav>
        <div class="icon">
        <img src="<?php echo e(asset('/storage/images/' . Auth::user()->images)); ?>" alt="aa">
        </div>
    </header>
    <div id="row">
        <div id="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p><?php echo e(Auth::user()->username); ?>さんの</p>
                <div class="count">
                  <p>フォロー数</p>
                  <!-- ログインしているユーザーがフォローしている人を持ってくる。なので、フォローしている人のリレーションを使うことで自分のIDをカウントできる -->
                  <p><?php echo e(Auth::user()->follows()->count()); ?>名</p>
                </div>
                  <a class="btn btn-primary btn-sm" href="/followList" role="button">フォローリスト</a>
                <div class="count">
                  <p>フォロワー数</p>
                  <!-- ログインしているユーザーをフォローしている人を持ってくる。なので、フォローされている人のリレーションを使うことで自分のIDをカウントできる -->
                  <p><?php echo e(Auth::user()->follower()->count()); ?>名</p>
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
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</html>
<?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/layouts/login.blade.php ENDPATH**/ ?>