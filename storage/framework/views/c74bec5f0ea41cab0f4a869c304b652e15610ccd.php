<?php $__env->startSection('title'); ?>API库 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('common-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/base/syntax-highlighter/shCore.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/base/syntax-highlighter/shCoreDefault.css')); ?>">
<script src="<?php echo e(asset('assets/base/syntax-highlighter/shCore.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/syntax-highlighter/shBrushJScript.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/api/details/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/api/details/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="doc-box">
        <h1>文档中心</h1>

        <div class="doc-container">
            <div class="left-side">
                <ul>
                    <li><a href="<?php echo e(route('api-index')); ?>">API概览</a></li>
                    <?php foreach($apis as $api): ?>
                    <li class="sub-menu <?php echo e($api['name'] === $menu ? 'active opened' : ''); ?>">
                        <label><?php echo e($api['name']); ?></label>
                        <ul>
                            <?php foreach($api['children'] as $child): ?>
                            <li class="<?php echo e($child['name'] === $subMenu ? 'active' : ''); ?>"><a href="/document/api/<?php echo e($child['classify']); ?>"><?php echo e($child['name']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="content-box">

                <h2><?php echo e($currentApi['name']); ?></h2>

                <div class="inner-content-box">

                    <p class="details"><?php echo e($currentDetail['desc']); ?></p>

                    <dt>URL</dt>
                    <dd>
                        <a class="hint-link"><?php echo e($currentDetail['url']); ?></a>
                    </dd>

                    <dt>支持格式</dt>
                    <dd><?php echo e($currentDetail['data-type']); ?></dd>

                    <dt>HTTP请求方式</dt>
                    <dd><?php echo e($currentDetail['http-method']); ?></dd>

                    <dt>是否需要登录</dt>
                    <dd><?php echo e($currentDetail['login']); ?></dd>

                    <dt>IP限制</dt>
                    <dd><?php echo e($currentDetail['ip-limit']); ?></dd>

                    <dt>请求参数</dt>
                    <dd>
                        <table class="info-table">
                            <thead>
                            <tr>
                                <th>参数名称</th>
                                <th width="100">是否必须</th>
                                <th width="100">类型</th>
                                <th width="400">描述</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($currentDetail['params']) > 0): ?>
                            <?php foreach($currentDetail['params'] as $params): ?>
                            <tr>
                                <td><?php echo e($params['name']); ?></td>
                                <td><?php echo e($params['required']); ?></td>
                                <td><?php echo e($params['type']); ?></td>
                                <td><?php echo e($params['desc']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="4">无</td>
                            </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </dd>

                    <?php if(count($currentDetail['remark']) > 0): ?>
                    <dt>注意事项</dt>
                    <dd>
                        <ul>
                            <?php foreach($currentDetail['remark'] as $remark): ?>
                            <li class="significant"><?php echo e($remark); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </dd>
                    <?php endif; ?>

                    <dt>正确返回结果</dt>
                    <dd>
                        <label>JSON示例</label>
                        <div>
                        <pre class="brush: js"><?php echo $currentDetail['returns'];?></pre>
                        </div>
                        <i>关于错误返回值与错误代码，参见<a href="#" class="hint-link">错误代码说明</a></i>
                    </dd>

                    <dt>返回字段说明</dt>
                    <dd>
                        <?php if(is_array($currentDetail['returns-field'])): ?>
                        <table class="info-table">
                            <thead>
                            <tr>
                                <th>接口名称</th>
                                <th width="100">是否必须</th>
                                <th width="100">类型</th>
                                <th width="400">描述</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($currentDetail['returns-field']) > 0): ?>
                            <?php foreach($currentDetail['returns-field'] as $field): ?>
                            <tr>
                                <td><?php echo e($field['name']); ?></td>
                                <td><?php echo e($field['required']); ?></td>
                                <td><?php echo e($field['type']); ?></td>
                                <td><?php echo e($field['desc']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="4">无</td>
                            </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <?php echo e($currentDetail['returns-field']); ?>

                        <?php endif; ?>
                    </dd>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>