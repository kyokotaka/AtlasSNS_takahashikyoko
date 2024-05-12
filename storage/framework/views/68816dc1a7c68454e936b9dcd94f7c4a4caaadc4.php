<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
<?php endif; ?>

<form action="/update"  method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <?php if($errors->any()): ?>
      
   <?php endif; ?>
  <div class="UserProfile">
  <img src="<?php echo e(asset('/storage/images/' . Auth::user()->images)); ?>" alt="aa">
  <ul>
    <li class="new_name">
    <label>ユーザー名</label>
    <!-- minlength="4"maxlength="12"はバリデーション的なもの。 -->
    <!-- valueでログイン中のユーザーの中から名前を抜き出している。 -->
    <input type="text" name="username" minlength="4"maxlength="12" value="<?php echo e(auth()->user()->username); ?>"></li>
    <li class="new_mail">
    <label>メールアドレス</label>
    <input type="email" name="mail" minlength="5"maxlength="40" value="<?php echo e(auth()->user()->mail); ?>"></li>
    <li class="new_pass">
    <label>パスワード</label>
    <input type="password" name="password"  ></li>
    <li class="new_pass_con">
    <label>パスワード確認</label>
    <input type="password" name="password_confirmation" ></li>
    <li class="new_bio">
    <label>自己紹介</label>
    <input type="text" name="bio" value="<?php echo e(auth()->user()->bio); ?>"></dd>
    <li class="new_icon">
    <label>アイコン画像</label>
    <input type="file" name="images" accept="image/png, image/jpeg, image/bmp, image/gif, image/svg"></li>
  </ul>
  </div>
  <div class="profile_edit">
    <input type="submit" name="profileupdate" class="btn btn-danger" value="更新">
    <!-- <button type="button" class="btn btn-danger">更新</button> -->
  </div>
    <?php echo csrf_field(); ?>
 
</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/users/profile.blade.php ENDPATH**/ ?>