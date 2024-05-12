<?php $__env->startSection('content'); ?>
    <!-- Laravel独自のフォームの書きかた -->
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <?php endif; ?>


    <?php echo Form::open(['url' =>'/top','class'=>'index_container']); ?>


    <?php echo csrf_field(); ?>
    <img src="<?php echo e(asset('/storage/images/' . Auth::user()->images)); ?>" alt="aa" class="post_user_image">
    <?php echo e(Form::textarea('new_post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください'])); ?>


    <button type="submit" class="post_btn "><img src="/images/post.png"></button>

    
      <?php echo Form::close(); ?>   


    <ul>
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="post_list">
        <div class="post_date">
          <img src="<?php echo e(asset('storage/images/' . $post->user->images)); ?>" alt="icon_images" class=post_image>
          <p class="username"><?php echo e($post->user->username); ?></p>
          <p class="update"><?php echo e($post->updated_at); ?></p>
        </div>
        <div class="post"><?php echo nl2br(htmlspecialchars($post->post)); ?></div>
        <div class="post_detail">
         <?php if(Auth::user()->id == $post->user_id): ?>
          <a class="edit js-modal-open" href="" post="<?php echo e($post->post); ?>"post_id="<?php echo e($post->id); ?>"value="<?php echo e($post->post); ?>"><img src="images/edit.png" alt="編集"></a>
          <?php echo csrf_field(); ?>
          <a class="delete" href="/post/<?php echo e($post->id); ?>/top"onclick="return confirm('この投稿を削除します。よろしいですか？')"><img src="images/trash.png" alt="削除" img onMouseOver="this.src='images/trash-h.png'" onMouseOut="this.src='images/trash.png'"></a>
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
              <button type="submit" class="post_edit"><img src="images/edit.png" alt="編集"></button>
              <?php echo e(csrf_field()); ?>

          </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/posts/index.blade.php ENDPATH**/ ?>