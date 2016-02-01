@extends('_layout.doc')

@section('title')文档中心 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/doc/faq/page.css')}}">
<script src="{{asset('assets/pages/doc/faq/page.js')}}"></script>
@stop

@section('document-content')
<h2 class="border">应用接入流程</h2>

<div class="inner-content-box">
    <div class="box">
        <h3>总流程图</h3>
        <p>
            开发者使用金桐开放平台，需要经过的简单的步骤：
        </p>
        <img src="/assets/flow/flow1.png">
    </div>

    <div class="box">
        <h2>具体流程如下</h2>

        <h3>第一步，创建金桐帐号</h3>
        <p>
            在开放平台首页点击“创建”或者“登录”，通过帐号登录成为一名开发者。
        </p>
        <img src="/assets/flow/flow2.png">
        <img src="/assets/flow/flow3.png">

        <p>
            在首页，点击注册，到注册界面
        </p>

        <img src="/assets/flow/flow4.png">

        <p>
            注册界面，填写相关的注册信息，注意，请填写在用的正确的手机号，点击获取验证码，验证码会发送到手机上，如果60S后仍没有收到，请点击重新获取验证码按钮，重新获取验证码；密码输入框，要求输入6-19位英文、字母、数字或符号，要求两次密码输入一致；以上全部输入正确后，须勾选同意金桐开放平台注册协议，然后点击注册，即可注册成功。
        </p>
    </div>

    <div class="box">
        <h3>收不到验证码</h3>

        <p>
            可以尝试以下两种方法，第一种，如果您使用的是手机注册，但无法收到验证码的短信，建议您切换注册方式，改用邮箱注册；第二种，如果已经使用邮箱注册，还是收不到验证码，请检查您的邮件垃圾箱，有可能验证码被误判断为垃圾邮件，放到了邮箱垃圾箱中。以上两种方法均尝试，仍无法收到，请联系客服（客服电话号码待定）。
        </p>

        <h3>忘记密码</h3>

        <p>
            在登录界面，点击忘记密码，可以找回密码，也即重置密码，如下图，手机找回，需要手机接收验证码，如下图：
        </p>

        <img src="/assets/flow/flow5.png">

        <p>
            如果是邮箱找回，会发送邮件到邮箱，点击链接重置密码，如下图
        </p>

        <img src="/assets/flow/flow6.png">

        <p>
            重置密码如下图：
        </p>

        <img src="/assets/flow/flow7.png">
    </div>

    <div class="box">
        <h3>第二步，开发者认证</h3>

        <p>
            请在开发者信息认证页填写真实资料。成为金桐认证的开发者，需要填写组织或个人的基本资料，确保其真实有效， 方可提交人工审核，审核通过后完成认证，即可进行接口等的调用等。如果用户是组织身份，如下：
        </p>

        <img src="/assets/flow/flow8.png">

        <p>
            组织用户审核中
        </p>

        <img src="/assets/flow/flow9.png">

        <p>
            组织用户审核通过
        </p>

        <img src="/assets/flow/flow10.png">
    </div>

    <div class="box">
        <h3>如果用户是个人用户</h3>

        <p>
            如下图所示：
        </p>

        <img src="/assets/flow/flow11.png">

        <p>
            注意，上传的组织营业执照等证件，以及个人上传的身份证件，需要满足开放平台规定的格式要求，提交后，3个工作日人工审核完毕，请关注认证中心的结果，若不符合要求，需要用户按照失败原因提示，重新提交资料等。为了更不影响用户的审核进度，请务必按要求上传证件等。
        </p>

        <p>
            未审核通过
        </p>

        <img src="/assets/flow/flow12.png">

        <p>已认证通过</p>

        <img src="/assets/flow/flow13.png">
    </div>

    <div class="box">
        <h3>第三步，认证通过</h3>

        <p>恭喜，您可以按照所需调用API接口了。</p>
    </div>
</div>
@stop