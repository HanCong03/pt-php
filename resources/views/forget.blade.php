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

                <div class="submit-row">
                    <button class="submit-btn" type="submit">下一步</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop