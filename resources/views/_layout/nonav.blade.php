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

    @yield('page-assets')
</head>
<body>
<div class="header">
    <div class="inner-header">
        <a href="{{route('index')}}" class="logo" title="星云开放平台"><h1>星云开放平台</h1></a>
    </div>
</div>

<div class="body">
    @yield('content')
</div>

<div class="footer">
    <div class="footer-box">
        <div class="left-footer">
            <div class="android"></div>
            <br/>
            <div class="apple"></div>
        </div>
        <div class="right-footer">
            <div class="copy">版权所有&copy;金桐网·京ICP证130290京公网安备11010502024991号</div>
            <div class="wrap-box">
                <div class="contact-phone">客服热线：4000-7000-11</div>
                <div class="contact-email">hr@gintong.com</div>
            </div>
            <div class="wrap-box icon-box">
                <a class="sina" href="#"><span>sina</span></a>
                <a class="weixin" href="#"><span>weixin</span></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>