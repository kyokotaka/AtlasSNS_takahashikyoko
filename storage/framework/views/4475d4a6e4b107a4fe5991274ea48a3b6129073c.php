<?php $__env->startSection('content'); ?>
<!-- フォロワーのアイコンリスト -->
<div class=icon_list>
  <p>フォロワーリスト</p>
   <?php $__currentLoopData = $follower_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('user_profile',['id' => $follower_user->id ])); ?>"><img src="<?php echo e(asset('images/' . $follower_user->images)); ?>" alt="<?php echo e($follower_user->username); ?>"></a>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<ul>
  <?php $__currentLoopData = $follower_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li class="post_list">
   <div class="post_date">
    <a href="<?php echo e(route('user_profile',['id' => $follower_user->id ])); ?>"><img src="<?php echo e(asset('images/' . $follower_post->user->images)); ?>" alt="" class=post_image></a>
    <p class="username"><?php echo e($follower_post->user->username); ?></p>
    <p class="update"><?php echo e($follower_post->updated_at); ?></p>
   </div>
   <div class="post"><?php echo e($follower_post->post); ?></div>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/Desktop/AtlasSNS_takahashikyoko/resources/views/follows/followerList.blade.php ENDPATH**/ ?>