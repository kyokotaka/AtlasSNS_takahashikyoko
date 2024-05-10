<?php $__env->startSection('content'); ?>



<form action="/update"  method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <?php if($errors->any()): ?>
      
   <?php endif; ?>
  <div class="UserProfile">
    
    <dt>ユーザー名</dt>
    <!-- minlength="4"maxlength="12"はバリデーション的なもの。 -->
    <!-- valueでログイン中のユーザーの中から名前を抜き出している。 -->
    <dd><input type="text" name="username" minlength="4"maxlength="12" value="<?php echo e(auth()->user()->username); ?>"></dd>
    <dt>メールアドレス</dt>
    <dd><input type="email" name="mail" minlength="5"maxlength="40" value="<?php echo e(auth()->user()->mail); ?>"></dd>
    <dt>パスワード</dt>
    <dd><input type="password" name="password" minlength="8"maxlength="20" ></dd>
    <dt>パスワード確認</dt>
    <dd><input type="password" name="password_confirmation"minlength="8"maxlength="20" ></dd>
    <dt>自己紹介</dt>
    <dd><input type="text" name="bio" value="<?php echo e(auth()->user()->bio); ?>"></dd>
    <dt>アイコン画像</dt>
    <input type="file" name="images" accept="image/png, image/jpeg, image/bmp, image/gif, image/svg"></dd>
  </div>
  
  <!-- <form action="/update" enctype="multipart/form-data" method="post"> -->
  <input type="submit" name="profileupdate" value="更新">
  <?php echo csrf_field(); ?>
 
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/Desktop/AtlasSNS_takahashikyoko/resources/views/users/profile.blade.php ENDPATH**/ ?>