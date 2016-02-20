@extends('_layout.nonav')

@section('title')非法访问 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/403/page.css')}}">
<script src="{{asset('assets/pages/403/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="error-box">
        <h1 class="error-tip">非法访问, <em>10</em>秒后跳转到首页</h1>
    </div>
</div>
@stop