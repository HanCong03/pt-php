<?php $__env->startSection('title'); ?>重置密码 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/reset-pwd/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/reset-pwd/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="reset-pwd-box">
        <h1>重置密码</h1>

        <form name="reset-pwd-form" action="<?php echo e(route('reset-pwd-api')); ?>" method="POST">
            <div class="form-table">
                <div class="form-row">
                    <input type="password" placeholder="新密码（6-19位英文、字母、数字或符号）" name="pwd">
                    <input type="hidden" name="passport" value="<?php echo e($passport); ?>">
                    <input type="hidden" name="verify-code" value="<?php echo e($verifyCode); ?>">
                    <i></i>
                </div>

                <div class="form-row">
                    <input type="password" placeholder="确认密码" name="confirm-pwd">
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