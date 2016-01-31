<?php $__env->startSection('title'); ?>开发者中心 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('common-assets'); ?>
@parent
<link rel="stylesheet" href="<?php echo e(asset('assets/base/styles/cropper.min.css')); ?>">

<script src="<?php echo e(asset('assets/base/webuploader.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/scripts/cropper.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/dev/avatar/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/dev/avatar/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-box'); ?>
<h2>基本资料</h2>

<table>
    <tbody>
    <tr>
        <th>提交材料审核</th>
        <td>
            <span>1326183****@163.com</span>
            <a href="#" class="modify-pwd-link">修改密码</a>
        </td>
    </tr>
    <tr>
        <th>注册时间</th>
        <td>
            2015-11-10
        </td>
    </tr>
    <tr>
        <th>修改头像</th>
        <td id="modifyBox">
            <div class="modify-head-wrap">
                <div class="modify-head-box">
                    <div class="file-btn">
                        <label><span>上传图片</span></label>
                        <div class="upload-file-container"></div>
                    </div>
                    <img id="imageFile" class="image-file">
                </div>
            </div>

            <div class="preview-box">
                <h3>效果预览</h3>

                <div class="default-preview-box">
                    <div class="preview-item">
                        <div class="preview-img-wrap size80">
                            <img src="/assets/default-user-head.jpg" width="80px" height="80px">
                        </div>
                        <label>80px * 80px</label>
                    </div>
                    <div class="preview-item">
                        <div class="preview-img-wrap size50">
                            <img src="/assets/default-user-head.jpg" width="50px" height="50px">
                        </div>
                        <label>50px * 50px</label>
                    </div>
                    <div class="preview-item">
                        <div class="preview-img-wrap size30">
                            <img src="/assets/default-user-head.jpg" width="30px" height="30px">
                        </div>
                        <label>30px * 30px</label>
                    </div>
                </div>

                <div class="modify-preview-box">
                    <div class="preview-item">
                        <div class="preview-img-wrap size80">
                            <img src="/assets/default-user-head.jpg" width="80px" height="80px">
                        </div>
                        <label>80px * 80px</label>
                    </div>
                    <div class="preview-item">
                        <div class="preview-img-wrap size50">
                            <img src="/assets/default-user-head.jpg" width="50px" height="50px">
                        </div>
                        <label>50px * 50px</label>
                    </div>
                    <div class="preview-item">
                        <div class="preview-img-wrap size30">
                            <img src="/assets/default-user-head.jpg" width="30px" height="30px">
                        </div>
                        <label>30px * 30px</label>
                    </div>
                </div>

                <div class="reupload-btn">
                    <label>重新上传</label>
                    <div class="upload-file-container"></div>
                </div>
            </div>

            <p class="tip">
                您上传的头像会自动生成三种尺寸，请注意中小尺寸的头像是否清晰。
            </p>

            <div class="btn-wrap">
                <form name="modify-head-form" action="/api/modifyHeadImage" method="POST">
                    <button type="submit" class="std-btn submit-btn">提交</button>
                </form>
                <button type="button" class="std-btn cancel-btn">取消</button>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.dev', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>