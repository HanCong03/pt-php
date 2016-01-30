@extends('_layout.base')

@section('title')忘记密码 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/forget/page.css')}}">
<script src="{{asset('assets/pages/forget/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="forget-box">
        <h1>忘记密码</h1>

        <form name="forget-form" action="{{route('forget-validate')}}" method="POST">
            <div class="form-table">
                <div class="form-row">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                    <input class="username-input" autocomplete="off" placeholder="请输入手机号/邮箱" name="username">
                    <i></i>
                </div>

                <div class="form-row" style="display: none;">
                    <input class="verify-code-input" autocomplete="off" maxlength="4" placeholder="请输入验证码" value="abcd" name="verify-code">
                    <div class="verify-code-box">
                        <img src="/resources/verify-code.png" id="verifyCode" width="140px" height="48px">
                        <button class="update-btn" id="refreshBtn" type="button">换一换</button>
                    </div>
                    <i></i>
                </div>
                <div class="submit-row">
                    <button class="submit-btn" type="submit">下一步</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop