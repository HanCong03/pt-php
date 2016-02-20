@extends('_layout.nonav')

@section('title')404 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/404/page.css')}}">
@stop

@section('content')
<div class="body">
    <div class="warning-box">
        <h1 class="warning-tip">404 页面未找到</h1>
    </div>
</div>
@stop