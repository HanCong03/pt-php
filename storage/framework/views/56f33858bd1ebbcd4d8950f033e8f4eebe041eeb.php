<?php $__env->startSection('title'); ?>找回密码 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/phone-validate/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/phone-validate/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="phone-validate-box">
        <h1>找回密码</h1>
        <form name="phone-validate-form" action="<?php echo e(route('reset-password')); ?>" method="POST">
            <div class="form-table">
                <div class="label-row">
                    <label>注册手机号</label>
                </div>

                <div class="form-row">
                    <input class="phone-input" disabled="disabled" value="<?php echo e($passport); ?>（手机验证）" name="phone">
                    <input type="hidden" name="passport" value="<?php echo e($passport); ?>">
                    <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                    <i></i>
                </div>

                <div class="form-row">
                    <input class="verify-code-input" autocomplete="off" maxlength="6" placeholder="验证码" name="verify-code">
                    <button class="refresh-btn" id="refreshBtn" type="button">获取验证码</button>
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