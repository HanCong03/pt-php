<?php $__env->startSection('title'); ?>API库 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/api/index/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/api/index/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="doc-box">
        <h1>API 库</h1>

        <div class="doc-container">
            <div class="left-side">
                <ul>
                    <li><a href="<?php echo e(route('api-index')); ?>">API概览</a></li>
                    <?php foreach($apis as $api): ?>
                    <li class="sub-menu <?php echo e($api['name'] === $menu ? 'active opened' : ''); ?>">
                        <label><?php echo e($api['name']); ?></label>
                        <ul>
                            <?php foreach($api['children'] as $child): ?>
                            <li class="<?php echo e($child['name'] === $current['name'] ? 'active' : ''); ?>"><a href="/document/api/<?php echo e($child['classify']); ?>"><?php echo e($child['name']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="content-box">
                <div class="api-classify">
                    <h2><?php echo e($current['name']); ?></h2>

                    <div class="inner-content-box">
                        <div class="table-box" style="margin-top: 50px;">
                            <table>
                                <thead>
                                <tr>
                                    <th width="170">接口分类</th>
                                    <th width="100">读写</th>
                                    <th width="320">接口功能说明</th>
                                    <th width="240">接口详细文档</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($current['children'] as $api): ?>
                                    <tr>
                                        <td rowspan=<?php echo e(count($api['children'])); ?>><?php echo e($api['name']); ?></td>
                                        <td><?php echo e($api['children'][0]['type']); ?></td>
                                        <td class="left"><?php echo e($api['children'][0]['detail']['desc']); ?></td>
                                        <td class="left"><a href="/document/api/<?php echo e($current['classify']); ?>/<?php echo e(str_replace('/', '.', $api['children'][0]['name'])); ?>" class="hint-link"><?php echo e($api['children'][0]['name']); ?></a></td>
                                    </tr>
                                        <?php foreach($api['children'] as $apiIndex=>$apiItem): ?>
                                            <?php if($apiIndex !== 0): ?>
                                            <tr>
                                                <td><?php echo e($apiItem['type']); ?></td>
                                                <td class="left"><?php echo e($apiItem['detail']['desc']); ?></td>
                                                <td class="left"><a href="/document/api/<?php echo e($current['classify']); ?>/<?php echo e(str_replace('/', '.', $apiItem['name'])); ?>" class="hint-link"><?php echo e($apiItem['name']); ?></a></td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>