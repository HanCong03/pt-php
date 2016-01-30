<?php $__env->startSection('title'); ?>收不到验证码 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/verify-code-faq/page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="faq-box">
    <h1>收不到验证码？</h1>
    <ol>
        <li>如果您使用的是手机注册，但无法接收到验证码的短信，建议您切换注册方式，使用邮箱进行注册；</li>
        <li>如果您使用的是邮件注册，但一直未接收到验证码，有可能被误判为垃圾邮件了，请到垃圾邮件文件夹查找。</li>
    </ol>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>