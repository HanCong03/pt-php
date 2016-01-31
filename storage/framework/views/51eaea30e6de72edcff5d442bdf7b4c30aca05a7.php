<?php $__env->startSection('title'); ?>开发者中心 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('common-assets'); ?>
@parent

<link rel="stylesheet" href="<?php echo e(asset('assets/base/styles/cropper.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/base/date-picker/jquery.datetimepicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/base/date-picker/date-picker.css')); ?>">

<script src="<?php echo e(asset('assets/base/scripts/cropper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/date-picker/jquery.datetimepicker.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/date-picker/date-picker.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/dev/basic/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/dev/basic/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-box'); ?>
<h2 class="border">基本资料</h2>

<div class="inner-content-box">
    <div class="right-box">
        <div class="right-head-box not-set">
            <img src="<?php echo e(asset('assets/default-user-head.jpg')); ?>" width="80px" height="80px">
            <a href="<?php echo e(route('avatar')); ?>" class="hint-link">添加头像</a>
        </div>

        <div class="right-head-box setted">
            <img src="<?php echo e(asset('assets/user-head.png')); ?>" width="80px" height="80px">
            <a href="<?php echo e(route('avatar')); ?>" class="hint-link">修改头像</a>
        </div>
    </div>

    <table>
        <tbody>
        <tr>
            <th>登录账号</th>
            <td>
                <span>1326183****@163.com</span>
                <a href="#" class="modify-pwd-link hint-link">修改密码</a>
            </td>
        </tr>
        <tr>
            <th>注册时间</th>
            <td>
                2015-11-10
            </td>
        </tr>
        <tr>
            <th>昵称</th>
            <td>
                <input type="text" name="nickname">
            </td>
        </tr>
        <tr>
            <th>性别</th>
            <td>
                <label>
                    <input type="radio" checked value="man" name="sex">
                    <span>男</span>
                </label>
                <label>
                    <input type="radio" value="woman" name="sex">
                    <span>女</span>
                </label>
            </td>
        </tr>
        <tr>
            <th>生日</th>
            <td>
                <input date-picker type="text" class="date-input" name="birthday">
            </td>
        </tr>
        <tr>
            <th>家乡</th>
            <td>
                <input type="hidden" value="北京,北京,海淀区" city-select name="city">
            </td>
        </tr>
        </tbody>
    </table>

    <h2>联系方式</h2>

    <table>
        <tbody>
        <tr>
            <th>手机号</th>
            <td>
                <input type="text" name="phone">
            </td>
        </tr>
        <tr>
            <th>邮箱</th>
            <td>
                <input type="text" disabled="disabled" value="1326193****@163.com">
            </td>
        </tr>
        </tbody>
    </table>

    <h2>兴趣爱好</h2>

    <table class="hobby-table">
        <tbody>
        <tr>
            <td>
                <input type="hidden" value="打高尔夫,台球,到处旅游,到处观光旅游">
                <ul class="label-list">
                    <li>打高尔夫</li>
                    <li>台球</li>
                    <li>到处旅游</li>
                    <li>到处观光旅游</li>
                </ul>
                <div>
                    <input type="text" placeholder="兴趣爱好标签（最多6个字）" class="hobby-input">
                    <button class="add-hobby-btn">添加</button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <h2>工作经历</h2>

    <table class="work-table">
        <tbody>

        <tr>
            <td>
                <div class="work-item">
                    <div class="work-info">
                        <p>北京金桐网投资有限公司（2015-11-1 — 至今）</p>
                        <p>产品经理</p>
                    </div>
                    <a href="#" class="hint-link edit-work">编辑</a>
                    <a href="#" class="hint-link del-work">删除</a>
                </div>

                <div class="edit-work-box">
                    <table>
                        <tbody>
                        <tr>
                            <th>公司名称</th>
                            <td>
                                <input type="text" class="company" value="北京金桐网投资有限公司">
                            </td>
                        </tr>
                        <tr>
                            <th>职位</th>
                            <td>
                                <input type="text" value="产品经理" class="job">
                            </td>
                        </tr>
                        <tr>
                            <th>在职时间</th>
                            <td>
                                <input type="text" date-picker value="2015-11-1" class="date-input start-date">
                                <span class="line"></span>
                                <input type="text" date-picker value="至今" class="date-input end-date">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button type="button" class="std-btn modify-work-btn">修改</button>
                                <button type="button" class="std-btn cancel-work-btn">取消</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="add-work-box">
                    <table>
                        <tbody>
                        <tr>
                            <th>公司名称</th>
                            <td>
                                <input type="text" class="company">
                            </td>
                        </tr>
                        <tr>
                            <th>职位</th>
                            <td>
                                <input type="text" class="job">
                            </td>
                        </tr>
                        <tr>
                            <th>在职时间</th>
                            <td>
                                <input type="text" date-picker class="start-date date-input">
                                <span class="line"></span>
                                <input type="text" date-picker class="end-date date-input">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button type="button" class="std-btn add-work-btn">添加</button>
                                <button type="button" class="std-btn reset-work-btn">重置</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <h2>教育经历</h2>

    <table class="edu-table">
        <tbody>

        <tr>
            <td>
                <div class="edu-item">
                    <div class="edu-info">
                        <p>大连外国语大学（2007-09-01 — 2011-07-01）</p>
                        <p><span>本科</span><span>英语专业</span></p>
                    </div>
                    <a href="#" class="hint-link edit-edu">编辑</a>
                    <a href="#" class="hint-link del-edu">删除</a>
                </div>

                <div class="edit-edu-box">
                    <table>
                        <tbody>
                        <tr>
                            <th>学校名称</th>
                            <td>
                                <input type="text" class="school" value="大连外国语大学">
                            </td>
                        </tr>
                        <tr>
                            <th>学历</th>
                            <td>
                                <select x-select x-class="degree-select" class="degree">
                                    <option>博士</option>
                                    <option>硕士</option>
                                    <option selected="selected">本科</option>
                                    <option>大专</option>
                                    <option>高中</option>
                                    <option>初中</option>
                                    <option>小学</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>专业</th>
                            <td>
                                <input type="text" value="英语专业" class="major">
                            </td>
                        </tr>
                        <tr>
                            <th>在职时间</th>
                            <td>
                                <input type="text" date-picker value="2007-09-01" class="date-input start-date">
                                <span class="line"></span>
                                <input type="text" date-picker value="2011-07-01" class="date-input end-date">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button type="button" class="std-btn modify-edu-btn">修改</button>
                                <button type="button" class="std-btn cancel-edu-btn">取消</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="add-edu-box">
                    <table>
                        <tbody>
                        <tr>
                            <th>学校名称</th>
                            <td>
                                <input type="text" class="school">
                            </td>
                        </tr>
                        <tr>
                            <th>学历</th>
                            <td>
                                <select x-select x-class="degree-select" class="degree">
                                    <option>博士</option>
                                    <option>硕士</option>
                                    <option selected="selected">本科</option>
                                    <option>大专</option>
                                    <option>高中</option>
                                    <option>初中</option>
                                    <option>小学</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>专业</th>
                            <td>
                                <input type="text" class="major">
                            </td>
                        </tr>
                        <tr>
                            <th>在职时间</th>
                            <td>
                                <input type="text" date-picker class="start-date date-input">
                                <span class="line"></span>
                                <input type="text" date-picker class="end-date date-input">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button type="button" class="std-btn add-edu-btn">添加</button>
                                <button type="button" class="std-btn reset-edu-btn">重置</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.dev', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>