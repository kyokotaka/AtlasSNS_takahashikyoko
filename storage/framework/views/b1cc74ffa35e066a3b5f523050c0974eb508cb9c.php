<?php $__env->startSection('content'); ?>
<!-- 適切なURLを入力してください -->
  <?php echo Form::open(['url' => '/login']); ?>

  <div class="form">
   <p class="heading">AtlasSNSへようこそ</p>
 <!-- </section> -->
    <div class="text_area">
      <?php echo e(Form::label('メールアドレス')); ?>

      <?php echo e(Form::text('mail',null,['class' => 'input'])); ?>

      <?php echo e(Form::label('パスワード')); ?>

      <?php echo e(Form::password('password',['class' => 'input'])); ?>

    </div>
    <div class="text-right">
    <input class="btn btn-danger btn-sm" type="submit" value="ログイン">
<!-- { Form::submit('ログイン',['class' => 'btn btn-danger']) } -->
    </div>
    <p class="new_user"><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/auth/login.blade.php ENDPATH**/ ?>