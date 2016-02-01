<?php $__env->startSection('title'); ?>API库 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/api/index/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/api/index/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="doc-box">
        <h1>文档中心</h1>

        <div class="doc-container">
            <div class="left-side">
                <ul>
                    <li class="active"><a href="<?php echo e(route('api-index')); ?>">API概览</a></li>
                    <?php foreach($apis as $api): ?>
                    <li class="sub-menu">
                        <label><?php echo e($api['name']); ?></label>
                        <ul>
                            <?php foreach($api['children'] as $child): ?>
                            <li><a href="/document/api/<?php echo e($child['classify']); ?>"><?php echo e($child['name']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="content-box">
                <?php foreach($apis as $level1=>$api): ?>
                <div class="api-classify">

                    <h2><?php echo e($api['name']); ?></h2>

                    <div class="inner-content-box">
                        <div class="base-api-box" href="#">
                            <?php foreach($api['children'] as $level2=>$apiList1): ?>
                            <a class="api-link" href="#<?php echo e($level1); ?>.<?php echo e($level2); ?>"><?php echo e($apiList1['name']); ?></a>
                            <?php endforeach; ?>
                        </div>

                        <?php foreach($api['children'] as $level3=>$apiList1): ?>
                        <div class="table-box">
                            <h3><a name="<?php echo e($level1); ?>.<?php echo e($level3); ?>"><?php echo e($apiList1['name']); ?></a></h3>

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
                                    <?php foreach($apiList1['children'] as $apiList2): ?>
                                    <?php if(count($apiList2['children']) > 0): ?>
                                    <tr>
                                        <td rowspan=<?php echo e(count($apiList2['children'])); ?>><?php echo e($apiList2['name']); ?></td>
                                        <td><?php echo e($apiList2['children'][0]['type']); ?></td>
                                        <td class="left"><?php echo e($apiList2['children'][0]['detail']['desc']); ?></td>
                                        <td class="left"><a href="/document/api/<?php echo e($apiList1['classify']); ?>/<?php echo e(str_replace('/', '.', $apiList2['children'][0]['name'])); ?>" class="hint-link"><?php echo e($apiList2['children'][0]['name']); ?></a></td>
                                    </tr>
                                        <?php foreach($apiList2['children'] as $apiIndex=>$apiItem): ?>
                                            <?php if($apiIndex !== 0): ?>
                                            <tr>
                                                <td><?php echo e($apiItem['type']); ?></td>
                                                <td class="left"><?php echo e($apiItem['detail']['desc']); ?></td>
                                                <td class="left"><a href="/document/api/<?php echo e($apiList1['classify']); ?>/<?php echo e(str_replace('/', '.', $apiItem['name'])); ?>" class="hint-link"><?php echo e($apiItem['name']); ?></a></td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>