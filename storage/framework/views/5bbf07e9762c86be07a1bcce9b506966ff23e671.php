<?php $__env->startSection('content'); ?>

 <div class=user_profile> 
 <td><img src="<?php echo e(asset('/images/'.$other->images)); ?>"></td>
 <td>ユーザー名<?php echo e($other->username); ?></td>
 <td>自己紹介<?php echo e($other->bio); ?></td>
<!-- {dd($other)}} --> 
 <?php if(!auth()->user()->isFollowing($other->id)): ?>
      <form method="POST" action="<?php echo e(route('follow',['id' => $other->id ])); ?>">
      <?php echo csrf_field(); ?>
      <button type="submit" class="btn  follow">フォロー</button>
      </form>
      <?php else: ?>
      <form method="POST" action="<?php echo e(route('un_follow',['id' => $other->id ])); ?>">
      <?php echo csrf_field(); ?>
      <button type="submit" class="btn  un_follow">フォロー解除</button>
      </form>
      <?php endif; ?>
    <table class="post table">
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <td><img src="<?php echo e(asset('images/' . $post->user->images)); ?>" ></td>
         <td><?php echo e($post->post); ?></td>
         <td><?php echo e($post->updated_at); ?></td>
       </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
 </div>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/Desktop/AtlasSNS_takahashikyoko/resources/views/users/userprofile.blade.php ENDPATH**/ ?>