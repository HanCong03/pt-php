@extends('_layout.base')

@section('common-assets')
<link rel="stylesheet" href="{{asset('assets/base/x-select/index.css')}}">
<link rel="stylesheet" href="{{asset('assets/base/city-select/index.css')}}">

<script src="{{asset('assets/base/x-select/index.js')}}"></script>
<script src="{{asset('assets/base/city-select/city-data.js')}}"></script>
<script src="{{asset('assets/base/city-select/index.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="dev-box">
        <h1>开发者中心</h1>

        <div class="dev-container">
            <div class="left-side">
                <!-- 已认证 -->
                <div class="user-info-box">
                    <img class="user-head" src="/assets/user-head.png" width="80px" height="80px">
                    <div class="user-info-list">
                        <div class="username-label">435999095@qq.com</div>
                        <div class="user-status certified">已认证</div>
                    </div>
                </div>

                <!-- 未认证 (和"审核中"一致) -->
                <div class="user-info-box">
                    <img class="user-head" src="/assets/default-user-head.jpg" width="80px" height="80px">
                    <div class="user-info-list">
                        <div class="username-label">435999095@qq.com</div>
                        <div class="user-status">未认证</div>
                    </div>
                </div>

                <!-- 审核中 -->
                <div class="user-info-box">
                    <img class="user-head" src="/assets/default-user-head.jpg" width="80px" height="80px">
                    <div class="user-info-list">
                        <div class="username-label">435999095@qq.com</div>
                        <div class="user-status">审核中</div>
                    </div>
                </div>

                <ul>
                    @foreach ($menu as $item)
                        <li {{$activeLabel === $item['label'] ? 'class=active' : ''}}><a href="{{$item['link']}}">{{$item['label']}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="content-box">
                @yield('content-box')
            </div>
        </div>
    </div>
</div>
@stop