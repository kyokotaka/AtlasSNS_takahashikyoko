<?php $__env->startSection('content'); ?>

  <div class=other_user_profile> 
    <img src="<?php echo e(asset('storage/images/'.$other->images)); ?>">
    <!-- <ul>
      <li class="other_username">ユーザー名</li>
      <li class="other_username"><?php echo e($other->username); ?></li>
      <li class=other_user_bio>自己紹介</li>
      <li class="other_user_bio"><?php echo e($other->bio); ?></li>
    </ul> -->
    <div class="other_user_name">
      <p class="other_name">ユーザー名</p>
      <p class="other_username"><?php echo e($other->username); ?></p>
    </div>
    <div class="Other_bio">
      <p class=user_bio>自己紹介</p>
      <p class="other_user_bio"><?php echo e($other->bio); ?></p>
    </div>
<!-- {dd($other)}} --> 
    <?php if(!auth()->user()->isFollowing($other->id)): ?>
      <form method="POST" action="<?php echo e(route('follow',['id' => $other->id ])); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-primary btn-sm">フォロー</button>
      </form>
    <?php else: ?>
      <form method="POST" action="<?php echo e(route('un_follow',['id' => $other->id ])); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger btn-sm">フォロー解除</button>
      </form>
    <?php endif; ?>
  </div>
  <ul>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="other_user_detail">
      <div class="other_user_postlist">
         <img src="<?php echo e(asset('/storage/images/' . $post->user->images)); ?>" >
         <p class="other_name"><?php echo e($post->user->username); ?></p>
         <p class="other_post"><?php echo e($post->post); ?></p>
         <p class="other_update"><?php echo e($post->updated_at); ?></p>
      </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/users/userprofile.blade.php ENDPATH**/ ?>