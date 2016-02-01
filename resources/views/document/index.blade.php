@extends('_layout.doc')

@section('title')文档中心 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/doc/index/page.css')}}">
<script src="{{asset('assets/pages/doc/index/page.js')}}"></script>
@stop

@section('document-content')
<h2 class="border">基本资料</h2>

<div class="inner-content-box">
    <div class="content-nav">
        <h3>欢迎进入金桐开放平台文档中心！</h3>
        <ul>
            <li class="guide">
                <a href="#">
                    <img src="/assets/pages/doc/index/images/icon1.png" width="64" height="64">
                    <span>新手指引</span>
                </a>
            </li>
            <li class="base-api">
                <a href="#">
                    <img src="/assets/pages/doc/index/images/icon2.png" width="64" height="64">
                    <span>基础支持类API</span>
                </a>
            </li>
            <li class="common-api">
                <a href="#">
                    <img src="/assets/pages/doc/index/images/icon3.png" width="64" height="64">
                    <span>通用类API</span>
                </a>
            </li>
            <li class="enhance-api">
                <a href="#">
                    <img src="/assets/pages/doc/index/images/icon4.png" width="64" height="64">
                    <span>功能增强类API</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="last-update-box">
        <h3>最近更新</h3>

        <ul>
            <li class="odd">
                <a href="#" class="hint-link">更新客户端文档引入js文件版本</a>
                <span>2015.11.04</span>
            </li>
            <li class="even">
                <a href="#" class="hint-link">增加验证回调URL有效性事件和套件信息更新事件</a>
                <span>2015.11.04</span>
            </li>
            <li class="odd">
                <a href="#" class="hint-link">更新客户端文档引入js文件版本</a>
                <span>2015.11.04</span>
            </li>
            <li class="even">
                <a href="#" class="hint-link">增加验证回调URL有效性事件和套件信息更新事件</a>
                <span>2015.11.04</span>
            </li>
            <li class="odd">
                <a href="#" class="hint-link">更新客户端文档引入js文件版本</a>
                <span>2015.11.04</span>
            </li>
            <li class="even">
                <a href="#" class="hint-link">增加验证回调URL有效性事件和套件信息更新事件</a>
                <span>2015.11.04</span>
            </li>
            <li class="odd">
                <a href="#" class="hint-link">更新客户端文档引入js文件版本</a>
                <span>2015.11.04</span>
            </li>
            <li class="even">
                <a href="#" class="hint-link">增加验证回调URL有效性事件和套件信息更新事件</a>
                <span>2015.11.04</span>
            </li>
        </ul>
    </div>

    <div class="faq-box">
        <h3>FQA<a href="#" class="hint-link">更多内容</a></h3>

        <ul>
            <li>Q:　调用管理通讯录接口返回430004，无效的HTTP HEADER Content-Type如何解决？</li>
            <li>A:　返回数据怎么转换成xml格式。</li>
            <li>Q:　调用管理通讯录接口返回430004，无效的HTTP HEADER Content-Type如何解决？</li>
            <li>A:　返回数据怎么转换成xml格式。</li>
            <li>Q:　调用管理通讯录接口返回430004，无效的HTTP HEADER Content-Type如何解决？</li>
            <li>A:　返回数据怎么转换成xml格式。</li>
            <li>Q:　调用管理通讯录接口返回430004，无效的HTTP HEADER Content-Type如何解决？</li>
            <li>A:　返回数据怎么转换成xml格式。</li>
            <li>Q:　调用管理通讯录接口返回430004，无效的HTTP HEADER Content-Type如何解决？</li>
            <li>A:　返回数据怎么转换成xml格式。</li>
        </ul>
    </div>
</div>
@stop