@extends('_layout.dev')

@section('title')开发者中心 - @stop

@section('common-assets')
@parent
<script src="{{asset('assets/base/webuploader.js')}}"></script>
@stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/dev/success/page.css')}}">
<script src="{{asset('assets/pages/dev/success/page.js')}}"></script>
@stop

@section('content-box')
<h2 class="border">恭喜您，您已认证成功！</h2>

<div class="inner-content-box org-auth">
    <ul class="progress-box progress-stage3">
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
            </td>
        </tr>
        </tbody>
    </table>

    <h2>联系人信息<a class="hint-link modify-link">修改信息</a></h2>

    <form name="modify-form" action="/api/dev/modify-contacts" method="POST">
        <table>
            <tbody>
            <tr>
                <th>联系人</th>
                <td>
                    <input type="text" disabled="disabled" name="contacts-name" value="张三">
                </td>
            </tr>

            <tr>
                <th>手机号码</th>
                <td>
                    <input type="text" disabled="disabled" name="contacts-phone" value="13162657788">
                </td>
            </tr>

            <tr>
                <th>电子邮箱</th>
                <td>
                    <input type="text" disabled="disabled" name="contacts-email" value="zhangsan@gintong.com">
                </td>
            </tr>

            <tr class="btn-row">
                <td colspan="2">
                    <button type="submit" class="std-btn submit-btn">提交</button>
                    <button type="button" class="std-btn cancel-btn">取消</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

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
            </td>
        </tr>
        </tbody>
    </table>
</div>
@stop