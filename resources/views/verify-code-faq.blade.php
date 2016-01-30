@extends('_layout.base')

@section('title')收不到验证码 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/verify-code-faq/page.css')}}">
@stop

@section('content')
<div class="faq-box">
    <h1>收不到验证码？</h1>
    <ol>
        <li>如果您使用的是手机注册，但无法接收到验证码的短信，建议您切换注册方式，使用邮箱进行注册；</li>
        <li>如果您使用的是邮件注册，但一直未接收到验证码，有可能被误判为垃圾邮件了，请到垃圾邮件文件夹查找。</li>
    </ol>
</div>
@stop