@extends('_layout.base')

@section('title')重置密码 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/reset-success/page.css')}}">
@stop

@section('content')
<div class="body">
    <div class="reset-success-box">
        <h1>密码重置成功</h1>

        <div class="reset-tip">
            <h2>密码重置成功</h2>
            <h3>您可以使用新密码登录金桐开放平台</h3>
        </div>

        <a class="login-link" href="{{route('login')}}">登录</a>
    </div>
</div>
@stop