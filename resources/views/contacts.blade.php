@extends('_layout.base')

@section('title')联系我们 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/contacts/page.css')}}">
@stop

@section('content')
<div class="body">
    <div class="doc-box">
        <h1>联系我们</h1>

        <div class="doc-container">
            <div class="left-side">
                <ul>
                    <li><a href="{{route('index')}}">首页</a></li>
                    <li><a href="#">概述</a></li>
                    <li><a href="#">新手指引</a></li>
                    <li><a href="#">基础支持类API</a></li>
                    <li><a href="#">通用类API</a></li>
                    <li><a href="#">功能增强类API</a></li>
                    <li><a href="{{route('faq')}}">FAQ</a></li>
                    <li><a href="{{route('recent-update')}}">最近更新</a></li>
                    <li class="active"><a href="{{route('contacts')}}">联系我们</a></li>
                </ul>
            </div>
            <div class="content-box">
                <h2>联系我们</h2>

                <div class="inner-content-box">
                    <ul>
                        <li>微信官方账号：gintong</li>
                        <li>微博官方账号：gintong</li>
                        <li>客服邮箱：kefu@gintong.com</li>
                        <li>联系电话：400-070-0011</li>
                        <li>传真：（+86 10）64843955</li>
                        <li>邮编：100101</li>
                        <li>地址：北京市朝阳区大屯路科学园南里风林西奥中心A座11层</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop