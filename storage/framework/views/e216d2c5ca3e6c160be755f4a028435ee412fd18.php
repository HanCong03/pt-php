<?php $__env->startSection('common-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/base/x-select/index.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/base/city-select/index.css')); ?>">

<script src="<?php echo e(asset('assets/base/x-select/index.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/city-select/city-data.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/city-select/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="dev-box">
        <h1>开发者中心</h1>

        <div class="dev-container">
            <div class="left-side">
                <!-- 已认证 -->
                <div class="user-info-box">
                    <img class="user-head" src="/assets/user-head.png" width="80px" height="80px">
                    <div class="user-info-list">
                        <div class="username-label">435999095@qq.com</div>
                        <div class="user-status certified">已认证</div>
                    </div>
                </div>

                <!-- 未认证 (和"审核中"一致) -->
                <div class="user-info-box">
                    <img class="user-head" src="/assets/default-user-head.jpg" width="80px" height="80px">
                    <div class="user-info-list">
                        <div class="username-label">435999095@qq.com</div>
                        <div class="user-status">未认证</div>
                    </div>
                </div>

                <!-- 审核中 -->
                <div class="user-info-box">
                    <img class="user-head" src="/assets/default-user-head.jpg" width="80px" height="80px">
                    <div class="user-info-list">
                        <div class="username-label">435999095@qq.com</div>
                        <div class="user-status">审核中</div>
                    </div>
                </div>

                <ul>
                    <?php foreach($menu as $item): ?>
                        <li <?php echo e($activeLabel === $item['label'] ? 'class=active' : ''); ?>><a href="<?php echo e($item['link']); ?>"><?php echo e($item['label']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="content-box">
                <?php echo $__env->yieldContent('content-box'); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>