<?php $__env->startSection('content'); ?>
<!-- 適切なURLを入力してください -->
<?php echo Form::open(['url' => '/register']); ?>

  <div class="form_register">
     <p class="heading">新規ユーザー登録</p>
      <div class="text_area">
        <?php echo e(Form::label('ユーザー名')); ?>

        <?php echo e(Form::text('username',null,['class' => 'input'])); ?>

        <?php echo e(Form::label('メールアドレス')); ?>

        <?php echo e(Form::text('mail',null,['class' => 'input'])); ?>

        <?php echo e(Form::label('パスワード')); ?>

        <?php echo e(Form::text('password',null,['class' => 'input'])); ?>

        <?php echo e(Form::label('パスワード確認')); ?>

        <?php echo e(Form::text('password_confirmation',null,['class' => 'input'])); ?>

      </div>
      <div class="text-right">
        <input class="btn btn-danger btn-sm" type="submit" value="新規登録">
      </div>
    <p><a href="/login">ログイン画面へ戻る</a></p>
  </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/auth/register.blade.php ENDPATH**/ ?>