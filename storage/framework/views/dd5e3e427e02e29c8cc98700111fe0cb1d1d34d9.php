<?php $__env->startSection('content'); ?>
<!-- フォローしている人のアイコンリスト -->
<div class=icon_list>
  <p>フォローリスト</p>
   <?php $__currentLoopData = $follow_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('user_profile',['id' => $follow_user->id ])); ?>"><img src="<?php echo e(asset('storage/images/' . $follow_user->images)); ?>" alt="a" class=post_image></a>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<ul>
  <?php $__currentLoopData = $follow_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li class="post_list">
    <div class="post_date">
      <a href="<?php echo e(route('user_profile',['id' => $follow_post->user->id ])); ?>"><img src="<?php echo e(asset('storage/images/' . $follow_post->user->images)); ?>" alt="a" class="post_image"></a>
      <p class="username"><?php echo e($follow_post->user->username); ?></p>
      <p class="update"><?php echo e($follow_post->updated_at); ?></p>
    </div>
    <div class="post"><?php echo e($follow_post->post); ?></div>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/follows/followList.blade.php ENDPATH**/ ?>