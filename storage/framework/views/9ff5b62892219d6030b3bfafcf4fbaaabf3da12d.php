<?php $__env->startSection('content'); ?>
<!-- //action→URLに表示される値のこと -->
<form method="post" action="/search">
  <!-- //csrfがないとURLにはてながつく -->
  <?php echo csrf_field(); ?>
  <div id="search">
    <input type="text" name="keyword"  placeholder="ユーザー名">
      <button type="submit"  class="search_btn"><img src="/images/search.png" ></button>
        <!-- //$search_wordは変数にしてあるため、{}で囲むことでechoと同じ意味になり、表示できる -->
      <h3><?php echo e($search_word); ?></h3>
  </div>
</form>
  <!-- //繰り返し処理 -->
  <div class="search_user">
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="user_detail">
      <img src="<?php echo e(asset('images/'.$user->images)); ?>">
      <p class=search_username><?php echo e($user->username); ?></p>
      <!-- //postで送り、URLはweb.phpのルートfollow.idを通りデータベースに登録する。この時idは$idを通りデータベースに登録する。この時idは$userの中にあるidを持ってくる。 -->
      <!-- 現在ログインしているユーザが$userの中に入っているid(つまりクリックした人のid)がなかったらisFollowingメソッドを通りフォローするボタンになる -->
        <?php if(!auth()->user()->isFollowing($user->id)): ?>
          <form method="POST" action="<?php echo e(route('follow',['id' => $user->id ])); ?>">
           <?php echo csrf_field(); ?>
           <button type="submit" class="btn btn-primary btn-sm" value="Submit">フォローする</button>
           <!-- <button type="submit" class="btn follow">フォロー</button> -->
          </form>
        <?php else: ?>
          <form method="POST" action="<?php echo e(route('un_follow',['id' => $user->id ])); ?>">
           <?php echo csrf_field(); ?>
           <button type="submit" class="btn btn-danger btn-sm" value="submit">フォロー解除</button>
           <!-- <button type="submit" class="btn un_follow">フォロー解除</button> -->
          </form>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/takahashikyouko/AtlasSNS_takahashikyoko/resources/views/users/search.blade.php ENDPATH**/ ?>