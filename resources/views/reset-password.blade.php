@extends('_layout.base')

@section('title')重置密码 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/reset-pwd/page.css')}}">
<script src="{{asset('assets/pages/reset-pwd/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="reset-pwd-box">
        <h1>重置密码</h1>

        <form name="reset-pwd-form" action="{{route('reset-pwd-api')}}" method="POST">
            <div class="form-table">
                <div class="form-row">
                    <input type="password" placeholder="新密码（6-19位英文、字母、数字或符号）" name="pwd">
                    <input type="hidden" name="passport" value="{{$passport}}">
                    <input type="hidden" name="verify-code" value="{{$verifyCode}}">
                    <i></i>
                </div>

                <div class="form-row">
                    <input type="password" placeholder="确认密码" name="confirm-pwd">
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