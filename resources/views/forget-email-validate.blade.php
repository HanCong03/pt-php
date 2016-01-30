@extends('_layout.base')

@section('title')找回密码 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/email-validate/page.css')}}">
<script src="{{asset('assets/pages/email-validate/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="email-validate-box">
        <h1>找回密码</h1>

        <p class="tip">
            重置密码链接已发送您（{{$passport}}）邮箱，请注意查收!
        </p>
    </div>
</div>
@stop