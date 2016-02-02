<?php $__env->startSection('title'); ?>忘记密码 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/forget/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/forget/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="forget-box">
        <h1>忘记密码</h1>

        <form name="forget-form" action="<?php echo e(route('forget-validate')); ?>" method="POST">
            <div class="form-table">
                <div class="form-row">
                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                    <input class="username-input" autocomplete="off" placeholder="请输入手机号/邮箱" name="username">
                    <i></i>
                </div>

                <div class="submit-row">
                    <button class="submit-btn" type="submit">下一步</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>