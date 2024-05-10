<?php $__env->startSection('content'); ?>
  <div class="container">
    <!-- Laravel独自のフォームの書きかた -->
    <?php echo Form::open(['url' =>'/top']); ?>

    <!-- <?php echo e(Form::token()); ?> -->
    <?php echo csrf_field(); ?>
    <div class="form">
      <?php echo e(Form::input('text', 'new_post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください'])); ?>

    </div>
    <button type="submit" class="post_btn "><img src="/images/post.png"></button>
      <?php echo Form::close(); ?>   
  </div>

    <ul>
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="post_list">
        <div class="post_date">
          <img src="<?php echo e(asset('images/' . $post->user->images)); ?>" alt="icon_images" class=post_image>
          <p class="username"><?php echo e($post->user->username); ?></p>
          <p class="update"><?php echo e($post->updated_at); ?></p>
        </div>
        <div class="post"><?php echo nl2br(htmlspecialchars($post->post)); ?></div>
        <div class="post_detail">
         <?php if(Auth::user()->id == $post->user_id): ?>
          <a class="edit js-modal-open" href="" post="<?php echo e($post->post); ?>"post_id="<?php echo e($post->id); ?>"value="<?php echo e($post->post); ?>"><img src="images/edit.png" alt="編集"></a>
          <?php echo csrf_field(); ?>
          <a class="delete" href="/post/<?php echo e($post->id); ?>/top"onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="images/trash.png" alt="削除"></a>
          <?php echo csrf_field(); ?>
         <?php endif; ?>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="/post/<?php echo e($post->id); ?>/top" method="post">
          <textarea name="Edit_post" class="modal_post" value=""></textarea>
              <input type="hidden" name="id" class="modal_id" value="">
              <input type="submit" value="更新">
              <?php echo e(csrf_field()); ?>

          </form>
          <a class="js-modal-close" href="/top">閉じる</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/Desktop/AtlasSNS_takahashikyoko/resources/views/posts/index.blade.php ENDPATH**/ ?>