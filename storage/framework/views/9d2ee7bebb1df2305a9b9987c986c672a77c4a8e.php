<?php $__env->startSection('title'); ?>重置密码 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/reset-success/page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="reset-success-box">
        <h1>密码重置成功</h1>

        <div class="reset-tip">
            <h2>密码重置成功</h2>
            <h3>您可以使用新密码登录金桐开放平台</h3>
        </div>

        <a class="login-link" href="<?php echo e(route('login')); ?>">登录</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>