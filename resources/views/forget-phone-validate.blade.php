@extends('_layout.base')

@section('title')找回密码 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/phone-validate/page.css')}}">
<script src="{{asset('assets/pages/phone-validate/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="phone-validate-box">
        <h1>找回密码</h1>
        <form name="phone-validate-form" action="{{route('reset-password')}}" method="POST">
            <div class="form-table">
                <div class="label-row">
                    <label>注册手机号</label>
                </div>

                <div class="form-row">
                    <input class="phone-input" disabled="disabled" value="{{$passport}}（手机验证）" name="phone">
                    <input type="hidden" name="passport" value="{{$passport}}">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                    <i></i>
                </div>

                <div class="form-row">
                    <input class="verify-code-input" autocomplete="off" maxlength="6" placeholder="验证码" name="verify-code">
                    <button class="refresh-btn" id="refreshBtn" type="button">获取验证码</button>
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