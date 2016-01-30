<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '')星云开放平台</title>

    <link rel="stylesheet" href="{{asset('assets/base/styles/basic/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/base/screen-lock/index.css')}}">

    <script src="{{asset('assets/base/scripts/jquery.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
    <script src="{{asset('assets/base/screen-lock/index.js')}}"></script>
    <script src="{{asset('assets/base/scripts/user-box.js')}}"></script>

    @yield('common-assets')

    @yield('page-assets')
</head>
<body>
<div class="header">
    <div class="inner-header">
        <a href="{{route('index')}}" class="logo" title="星云开放平台"><h1>星云开放平台</h1></a>
        <div class="header-links">
            <nav class="nav">
                <ul>
                    <li class="active">
                        <a href="{{route('index')}}">首页</a>
                    </li>
                    <li>
                        <a href="{{route('document-index')}}">文档中心</a>
                    </li>
                    <li>
                        <a href="#">API库</a>
                    </li>
                    <li>
                        <a href="#">开发者社区</a>
                    </li>
                    <li>
                        <a href="#">联系我们</a>
                    </li>
                </ul>
            </nav>

            @if (is_null($user))
            <!-- 未登录 -->
            <ul class="header-login-box">
                <li>
                    <a href="{{route('login')}}">登录</a>
                </li>
                <li>
                    <a href="{{route('register')}}">注册</a>
                </li>
            </ul>
            @else
            <!-- 已登录 -->
            <div class="user-box">
                <label>{{$user['userLoginRegister']['passport']}}</label>
                <ul>
                    <li><a href="#">开发者中心</a></li>
                    <li><a href="#">退出系统</a></li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="body">
    @yield('content')
</div>

<div class="footer">

</div>

</body>
</html>