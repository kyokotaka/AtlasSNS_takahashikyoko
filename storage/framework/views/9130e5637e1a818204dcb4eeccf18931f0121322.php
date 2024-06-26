<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?> ">
  <link rel="stylesheet" href="<?php echo e(asset('css/logout.css')); ?> ">
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
</head>
<body>
  <header>
    <img src="images/atlas.png" class="top-image" >
    <p class="top-title">Social Network Service</p>
  </header>
  <div id="container">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
  <script src="JavaScriptファイルのURL"></script>
  <script src="JavaScriptファイルのURL"></script>
</body>
</html>
<?php /**PATH /Users/takahashikyouko/Desktop/AtlasSNS_takahashikyoko/resources/views/layouts/logout.blade.php ENDPATH**/ ?>