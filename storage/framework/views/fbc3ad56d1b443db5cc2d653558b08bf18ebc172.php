<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="doc-box">
        <h1>文档中心</h1>

        <div class="doc-container">
            <div class="left-side">
                <ul>
                <?php foreach($menu as $item): ?>
                    <?php if(isset($item['sub'])): ?>
                        <li class="sub-menu <?php echo e(isset($activeSubmenu) ? 'active opened' : ''); ?>">
                            <label><?php echo e($item['label']); ?></label>
                            <ul>
                                <?php foreach($item['sub'] as $subItem): ?>
                                    <li <?php echo e($activeLabel === $subItem['label'] ? 'class=active' : ''); ?>>
                                        <a href="<?php echo e($subItem['link']); ?>"><?php echo e($subItem['label']); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li <?php echo e($activeLabel === $item['label'] ? 'class=active' : ''); ?>><a href="<?php echo e($item['link']); ?>"><?php echo e($item['label']); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="content-box">
                <?php echo $__env->yieldContent('document-content'); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>