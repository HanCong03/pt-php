<?php $__env->startSection('title'); ?>API库 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('common-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/base/syntax-highlighter/shCore.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/base/syntax-highlighter/shCoreDefault.css')); ?>">
<script src="<?php echo e(asset('assets/base/syntax-highlighter/shCore.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/syntax-highlighter/shBrushJScript.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/syntax-highlighter/shBrushBash.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/api/details/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/api/details/page.js')); ?>"></script>
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

                    <dt>请求参数<span style="font-size: 12px;">（各个参数请进行URL 编码，编码时请遵守 <a href="http://tools.ietf.org/html/rfc1738" target="_blank">RFC 1738</a>）</span></dt>
                    <dd>
                        <div>
                            <label>1. 公有参数</label>

                            <div style="margin: 10px 0">
                                <?php if(!isset($currentDetail['public-params'])): ?>
                                    <label>发送请求时必须传入公共参数，详见<a href="http://wk.gintong.com/index.php?title=%E5%85%AC%E5%85%B1%E5%8F%82%E6%95%B0%E8%AF%B4%E6%98%8E">公共参数说明</a>。</label>
                                <?php else: ?>
                                    <?php if(!(isset($currentDetail['public-params']['tip']) && $currentDetail['public-params']['tip'] === false)): ?>
                                    <label>发送请求时必须传入公共参数，详见<a href="http://wk.gintong.com/index.php?title=%E5%85%AC%E5%85%B1%E5%8F%82%E6%95%B0%E8%AF%B4%E6%98%8E">公共参数说明</a>。</label>
                                    <?php endif; ?>

                                    <?php if(count($currentDetail['public-params']['list']) > 0): ?>
                                    <table class="info-table" style="margin: 10px 0;">
                                        <thead>
                                        <tr>
                                            <th>参数名称</th>
                                            <th width="100">是否必须</th>
                                            <th width="100">类型</th>
                                            <th width="400">描述</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($currentDetail['public-params']['list'] as $params): ?>
                                        <tr>
                                            <td style="text-align: left;"><?php echo e($params['name']); ?></td>
                                            <td><?php echo e($params['required']); ?></td>
                                            <td><?php echo e($params['type']); ?></td>
                                            <td style="text-align: left;"><?php echo e($params['desc']); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label>2. 私有参数</label>
                            <table class="info-table" style="margin: 10px 0;">
                                <thead>
                                <tr>
                                    <th>参数名称</th>
                                    <th width="100">是否必须</th>
                                    <th width="100">类型</th>
                                    <th width="400">描述</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($currentDetail['private-params']) > 0): ?>
                                <?php foreach($currentDetail['private-params'] as $params): ?>
                                <tr>
                                    <td style="text-align: left;"><?php echo e($params['name']); ?></td>
                                    <td><?php echo e($params['required']); ?></td>
                                    <td><?php echo e($params['type']); ?></td>
                                    <td style="text-align: left;"><?php echo e($params['desc']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="4">无</td>
                                </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </dd>

                    <dt>请求示例</dt>
                    <dd>
                        <?php foreach($currentDetail['examples'] as $example): ?>
                        <div>
                            <?php if(isset($example['label'])): ?>
                            <label><?php echo e($example['label']); ?></label>
                            <?php endif; ?>

                            <div class="bash-examples">
                                <pre class="brush: bash"><?php if (isset($example['code'])) {echo $example['code'];} else {echo ' ';}?></pre>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                                <td style="text-align: left;"><?php echo e($field['name']); ?></td>
                                <td><?php echo e($field['required']); ?></td>
                                <td><?php echo e($field['type']); ?></td>
                                <td style="text-align: left;"><?php echo e($field['desc']); ?></td>
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

                    <?php foreach($currentDetail['returns'] as $returns): ?>
                        <?php if(isset($returns['title'])): ?>
                        <dt><?php echo e($returns['title']); ?></dt>
                        <?php endif; ?>

                        <?php foreach($returns['list'] as $list): ?>
                        <dd>
                            <?php if(isset($list['label'])): ?>
                            <label><?php echo e($list['label']); ?></label>
                            <?php endif; ?>

                            <div>
                                <pre class="brush: js"><?php if (isset($list['code'])) {echo $list['code'];} else {echo ' ';}?></pre>
                            </div>
                        </dd>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>