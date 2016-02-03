@extends('_layout.base')

@section('title')找回密码 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/email-validate-error/page.css')}}">
<script src="{{asset('assets/pages/email-validate-error/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="email-validate-box">
        <h1>找回密码</h1>

        <p class="tip">
            重置过程发生错误: {{$message}}
        </p>
    </div>
</div>
@stop