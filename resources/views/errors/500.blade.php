@extends('_layout.nonav')

@section('title')服务器错误 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/5xx/page.css')}}">
@stop

@section('content')
<div class="body">
    <div class="error-box">
        <h1 class="error-tip">服务器错误(500)</h1>
    </div>
</div>
@stop