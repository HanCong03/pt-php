@extends('_layout.base')

@section('title')API库 - @stop

@section('common-assets')
<link rel="stylesheet" href="{{asset('assets/base/syntax-highlighter/shCore.css')}}">
<link rel="stylesheet" href="{{asset('assets/base/syntax-highlighter/shCoreDefault.css')}}">
<script src="{{asset('assets/base/syntax-highlighter/shCore.js')}}"></script>
<script src="{{asset('assets/base/syntax-highlighter/shBrushJScript.js')}}"></script>
@stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/api/details/page.css')}}">
<script src="{{asset('assets/pages/api/details/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="doc-box">
        <h1>文档中心</h1>

        <div class="doc-container">
            <div class="left-side">
                <ul>
                    <li><a href="{{route('api-index')}}">API概览</a></li>
                    @foreach ($apis as $api)
                    <li class="sub-menu {{$api['name'] === $menu ? 'active opened' : ''}}">
                        <label>{{$api['name']}}</label>
                        <ul>
                            @foreach ($api['children'] as $child)
                            <li class="{{$child['name'] === $subMenu ? 'active' : ''}}"><a href="/document/api/{{$child['classify']}}">{{$child['name']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="content-box">

                <h2>{{$currentApi['name']}}</h2>

                <div class="inner-content-box">

                    <p class="details">{{$currentDetail['desc']}}</p>

                    <dt>URL</dt>
                    <dd>
                        <a class="hint-link" href="{{$currentDetail['url']}}">{{$currentDetail['url']}}</a>
                    </dd>

                    <dt>支持格式</dt>
                    <dd>{{$currentDetail['data-type']}}</dd>

                    <dt>HTTP请求方式</dt>
                    <dd>{{$currentDetail['http-method']}}</dd>

                    <dt>是否需要登录</dt>
                    <dd>{{$currentDetail['login']}}</dd>

                    <dt>IP限制</dt>
                    <dd>{{$currentDetail['ip-limit']}}</dd>

                    <dt>请求参数</dt>
                    <dd>
                        <table class="info-table">
                            <thead>
                            <tr>
                                <th>参数名称</th>
                                <th width="100">是否必须</th>
                                <th width="100">类型</th>
                                <th width="400">描述</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($currentDetail['params'] as $params)
                            <tr>
                                <td>{{$params['name']}}</td>
                                <td>{{$params['required']}}</td>
                                <td>{{$params['type']}}</td>
                                <td>{{$params['desc']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </dd>

                    <dt>注意事项</dt>
                    <dd>
                        <ul>
                            @foreach ($currentDetail['remark'] as $remark)
                            <li class="significant">{{$remark}}</li>
                            @endforeach
                        </ul>
                    </dd>

                    <dt>正确返回结果</dt>
                    <dd>
                        <label>JSON示例</label>
                        <div>
                        <pre class="brush: js"><?php echo $currentDetail['returns'];?></pre>
                        </div>
                        <i>关于错误返回值与错误代码，参见<a href="#" class="hint-link">错误代码说明</a></i>
                    </dd>

                    <dt>返回字段说明</dt>
                    <dd>
                        <table class="info-table">
                            <thead>
                            <tr>
                                <th>接口名称</th>
                                <th width="100">是否必须</th>
                                <th width="100">类型</th>
                                <th width="400">描述</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($currentDetail['returns-field'] as $field)
                            <tr>
                                <td>{{$field['name']}}</td>
                                <td>{{$field['required']}}</td>
                                <td>{{$field['type']}}</td>
                                <td>{{$field['desc']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </dd>
                </div>
            </div>
        </div>
    </div>
</div>
@stop