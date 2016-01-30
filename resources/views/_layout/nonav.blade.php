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

</div>

</body>
</html>