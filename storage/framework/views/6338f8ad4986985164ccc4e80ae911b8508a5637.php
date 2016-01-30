<?php $__env->startSection('title'); ?>注册账号 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/register/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/register/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="register-box">
        <h1>注册账号</h1>

        <form name="register-form" action="/api-data/register" method="POST">
            <div class="form-table">
                <!-- 1: email, 2: phone-->
                <input type="hidden" value="1" name="type"/>

                <div class="form-row">
                    <input placeholder="请输入手机号/邮箱" autocomplete="off" name="username">
                    <i></i>
                </div>

                <div class="form-row">
                    <input class="verify-code-input" autocomplete="off" maxlength="6" placeholder="验证码" name="verify-code">
                    <button class="refresh-btn" id="refreshBtn" type="button">获取验证码</button>
                    <i></i>
                </div>

                <div class="form-row">
                    <input type="password" placeholder="登录密码（6-19位英文、字母、数字或符号）" name="pwd">
                    <i></i>
                </div>

                <div class="form-row">
                    <input type="password" placeholder="确认密码" name="confirm-pwd">
                    <i></i>
                </div>

                <div class="submit-row">
                    <button class="submit-btn" type="submit">注册</button>
                </div>

                <a class="faq-link" target="_blank" href="<?php echo e(route('verify-code-faq')); ?>">收不到验证码？</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>