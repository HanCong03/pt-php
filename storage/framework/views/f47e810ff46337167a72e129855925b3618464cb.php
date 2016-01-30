<?php $__env->startSection('title'); ?>开发者中心 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('common-assets'); ?>
@parent
<script src="<?php echo e(asset('assets/base/webuploader.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/dev/review/page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-box'); ?>
<h2 class="border">您的资料正在审核中...</h2>

<div class="inner-content-box org-auth">

    <ul class="progress-box progress-stage2">
        <li class="stage1"><i></i><span>提交资料审核</span></li>
        <li class="stage2"><i></i><span>等待人工审核</span></li>
        <li class="stage3"><i></i><span>完成认证</span></li>
    </ul>

    <h2>组织信息</h2>

    <table>
        <tbody>
        <tr>
            <th>组织全称</th>
            <td>
                <input type="text" disabled="disabled" value="北京金桐网投资有限公司">
            </td>
        </tr>

        <tr>
            <th>组织简称</th>
            <td>
                <input type="text" disabled="disabled" value="金桐网">
            </td>
        </tr>

        <tr>
            <th>类型</th>
            <td>
                <input type="text" disabled="disabled"  value="一般企业">
            </td>
        </tr>

        <tr>
            <th>行业</th>
            <td>
                <input type="text" disabled="disabled"  value="房地产">
            </td>
        </tr>

        <tr>
            <th>所在地</th>
            <td>
                <input type="text" disabled="disabled"  value="北京市朝阳区">
            </td>
        </tr>

        <tr>
            <th>资质证明</th>
            <td>
                <div class="aptitude-box">
                    <img src="/assets/aptitude@2.png" width="131" height="102">
                </div>

                <ol class="aptitude-stated">
                    <li>企、事业单位可直接上传营业执照副本、组织机构代码、税务登记证等任意一种</li>
                    <li>其他公共机构可上传盖有公章的介绍信</li>
                    <li>上传资质证明可为扫描件或电子照片，请确保信息清晰可见</li>
                    <li>上传图像文件大小不超过5M，支持jpg、png、bmp</li>
                </ol>
            </td>
        </tr>
        </tbody>
    </table>

    <h2>联系人信息</h2>

    <table>
        <tbody>
        <tr>
            <th>联系人</th>
            <td>
                <input type="text" disabled="disabled" value="张三">
            </td>
        </tr>

        <tr>
            <th>手机号码</th>
            <td>
                <input type="text" disabled="disabled" value="13162657788">
            </td>
        </tr>

        <tr>
            <th>电子邮箱</th>
            <td>
                <input type="text" disabled="disabled" value="zhangsan@gintong.com">
            </td>
        </tr>
        </tbody>
    </table>

    <h2>个人信息</h2>

    <table>
        <tbody>
        <tr>
            <th>真实姓名</th>
            <td>
                <input type="text" disabled="disabled" value="张三">
            </td>
        </tr>

        <tr>
            <th>手机号码</th>
            <td>
                <input type="text" disabled="disabled" value="13162657788">
            </td>
        </tr>

        <tr>
            <th>分类</th>
            <td>
                <input type="text" disabled="disabled"  value="一般企业">
            </td>
        </tr>

        <tr>
            <th>行业</th>
            <td>
                <input type="text" disabled="disabled"  value="房地产">
            </td>
        </tr>

        <tr>
            <th>所在地</th>
            <td>
                <input type="text" disabled="disabled"  value="北京市朝阳区">
            </td>
        </tr>

        <tr>
            <th>身份证</th>
            <td>
                <div class="card1-box">
                    <img src="/assets/aptitude@2.png" width="131" height="102">
                </div>

                <div class="card2-box">
                    <img src="/assets/aptitude@2.png" width="131" height="102">
                </div>

                <ol class="card-stated">
                    <li>身份证正反面都需要上传</li>
                    <li>上传身份证可为扫描件或电子照片，请确保信息清晰可见</li>
                    <li>上传图像文件大小不超过5M，支持jpg、png、bmp</li>
                </ol>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.dev', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>