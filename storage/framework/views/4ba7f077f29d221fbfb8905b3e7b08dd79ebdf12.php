<?php $__env->startSection('title'); ?>找回密码 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/email-validate/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/email-validate/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="email-validate-box">
        <h1>找回密码</h1>

        <p class="tip">
            重置密码链接已发送您（<?php echo e($passport); ?>）邮箱，请注意查收!
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>