@extends('_layout.dev')

@section('title')开发者中心 - @stop

@section('common-assets')
@parent
<script src="{{asset('assets/base/webuploader.js')}}"></script>
@stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/dev/not-certified/page.css')}}">
<script src="{{asset('assets/pages/dev/not-certified/page.js')}}"></script>
@stop

@section('content-box')
<h2 class="border">申请实名认证（未认证）</h2>

<div class="inner-content-box org-auth">

    <ul class="progress-box progress-stage1">
        <li class="stage1"><i></i><span>提交资料审核</span></li>
        <li class="stage2"><i></i><span>等待人工审核</span></li>
        <li class="stage3"><i></i><span>完成认证</span></li>
    </ul>

    <h2>已登录帐号</h2>

    <table class="account-table">
        <tbody>
        <tr>
            <th>邮箱账号</th>
            <td>
                1326193****@163.com
                <a href="#" class="hint-link">更改账号</a>
            </td>
        </tr>
        </tbody>
    </table>

    <table class="auth-type-table">
        <tbody>
        <tr>
            <th><h2>实名认证</h2></th>
            <td>
                <button class="hint-btn org-type-btn">组织</button>
                <button class="hint-btn personal-type-btn">个人</button>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="org-box info-box">
        <h2>组织信息</h2>

        <table>
            <tbody>
            <tr>
                <th>组织全称</th>
                <td>
                    <input type="text" placeholder="请填写与营业执照一致的名称" name="full-name">
                </td>
            </tr>

            <tr>
                <th>组织简称</th>
                <td>
                    <input type="text" placeholder="请填写不超过6个字的组织简称" name="short-name">
                </td>
            </tr>

            <tr>
                <th>类型</th>
                <td>
                    <select x-select x-class="type-select" class="type">
                        <option>金融机构</option>
                        <option selected="selected">一般企业</option>
                        <option>政府组织</option>
                        <option>中介机构</option>
                        <option>专业媒体</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>行业</th>
                <td>
                    <input type="text" placeholder="请选择组织行业" class="industry-input" name="industry">
                </td>
            </tr>

            <tr>
                <th>所在地</th>
                <td>
                    <input type="hidden" value="北京,北京,海淀区" city-select name="address">
                </td>
            </tr>

            <tr>
                <th>资质证明</th>
                <td>
                    <div class="upload-aptitude-btn aptitude-container">
                    </div>

                    <div class="reupload-aptitude-btn">
                        <img src="/assets/aptitude@2.png" width="131" height="102">
                        <div class="reupload-btn">
                            <span>重新上传</span>
                            <div class="aptitude-container"></div>
                        </div>
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
                    <input type="text" placeholder="请填写联系人的真实姓名" name="contacts-name">
                </td>
            </tr>

            <tr>
                <th>手机号码</th>
                <td>
                    <input type="text" placeholder="请填写联系人的手机号码" name="contacts-name">
                </td>
            </tr>

            <tr>
                <th>电子邮箱</th>
                <td>
                    <input type="text" placeholder="请填写联系人的电子邮箱" name="contacts-email">
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="personal-box info-box">
        <h2>个人信息</h2>

        <table>
            <tbody>
            <tr>
                <th>真实姓名</th>
                <td>
                    <input type="text" placeholder="请填写与身份证一致的姓名" name="name">
                </td>
            </tr>

            <tr>
                <th>手机号码</th>
                <td>
                    <input type="text" placeholder="请填写您的手机号码" name="phone">
                </td>
            </tr>

            <tr>
                <th>分类</th>
                <td>
                    <select x-select x-class="type-select" class="type">
                        <option>请选择分类</option>
                        <option>金融机构</option>
                        <option>一般企业</option>
                        <option>政府组织</option>
                        <option>中介机构</option>
                        <option>专业媒体</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>行业</th>
                <td>
                    <input type="text" placeholder="请选择组织行业" class="industry-input" name="industry">
                </td>
            </tr>

            <tr>
                <th>所在地</th>
                <td>
                    <input type="hidden" value="北京,北京,海淀区" city-select name="address">
                </td>
            </tr>

            <tr>
                <th>身份证</th>
                <td>
                    <div class="card-box">
                        <div class="card-inner-box">
                            <div class="upload-card1-btn card-btn-container1"></div>
                            <div class="reupload-card1-btn">
                                <img width="131" height="102">
                                <div class="reupload-btn">
                                    <span>重新上传</span>
                                    <div class="card-btn-container1"></div>
                                </div>
                            </div>
                        </div>

                        <label>身份证正面</label>
                    </div>

                    <div class="card-box">
                        <div class="card-inner-box">
                            <div class="upload-card2-btn card-btn-container2"></div>
                            <div class="reupload-card2-btn">
                                <img width="131" height="102">
                                <div class="reupload-btn">
                                    <span>重新上传</span>
                                    <div class="card-btn-container2"></div>
                                </div>
                            </div>
                        </div>
                        <label>身份证反面</label>
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

    <table class="protocol-table">
        <tbody>
        <tr>
            <th colspan="2">
                <label>
                    <input type="checkbox" name="protocol">
                    我同意并遵守上述的<a class="hint-link" target="_blank" href="{{route('service-agreement')}}">《星云开放平台开发者服务协议》</a>
                </label>
            </th>
        </tr>
        </tbody>
    </table>

    <div id="industryDialog" class="industry-dialog">
        <div class="dialog-head">
            <h1>选择行业</h1>
            <button class="close-dialog-btn"></button>
        </div>

        <div class="dialog-body">
            <div class="selected-box">
                <label>最多选择1项</label>
                <ul class="selected-list">
                    <!--<li>矿产资源</li>-->
                </ul>
            </div>

            <ul class="tabs-title">
                <li class="active">全部行业</li>
            </ul>

            <ul class="tabs-content">
                <li>
                    <ul class="industry-group">
                        <li>能源</li>
                        <li>工商业</li>
                        <li>矿产资源</li>
                        <li>医药</li>
                        <li>消费品</li>
                        <li>金融</li>
                        <li>房地产</li>
                        <li>公用事业</li>
                        <li>农林牧渔</li>
                        <li>通信、媒体与科技</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="dialog-foot">
            <button class="std-btn ok-btn">确定</button>
            <button class="std-btn cancel-btn">取消</button>
        </div>
    </div>
</div>
@stop