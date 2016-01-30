<?php $__env->startSection('title'); ?>登录 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/login/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/login/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="login-box">
        <div class="login-inner-box">
            <form name="login-form" action="<?php echo e(route('login-api')); ?>" method="POST">
                <div class="form-row">
                    <input type="text" class="username-input std-input" autocomplete="off" name="username" placeholder="手机号/邮箱">
                    <i></i>
                </div>
                <div class="form-row">
                    <input type="password" class="password-input std-input" name="password" placeholder="登录密码">
                    <i></i>
                </div>
                <div class="form-row">
                    <label>
                        <input type="checkbox" name="remember">
                        下次自动登录
                    </label>
                    <a class="hint-link forget-link" href="<?php echo e(route('forget')); ?>">忘记密码</a>
                </div>
                <div class="form-row">
                    <button class="std-submit-btn" type="submit">登录</button>
                </div>
                <div class="form-row register-link-row">
                    <a class="hint-link register-link" href="<?php echo e(route('register')); ?>">立即注册</a>
                </div>
            </form>

            <div class="third-login-box">
                <h3><span>第三方登录</span></h3>

                <div class="link-box">
                    <a href="#" class="sina"><span>sina</span></a>
                    <a href="#" class="weixin"><span>weixin</span></a>
                    <a href="#" class="qq"><span>QQ</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.nonav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>