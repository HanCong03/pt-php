@extends('_layout.base')

@section('title')API库 - @stop

@section('common-assets')
<link rel="stylesheet" href="{{asset('assets/base/syntax-highlighter/shCore.css')}}">
<link rel="stylesheet" href="{{asset('assets/base/syntax-highlighter/shCoreDefault.css')}}">
<script src="{{asset('assets/base/syntax-highlighter/shCore.js')}}"></script>
<script src="{{asset('assets/base/syntax-highlighter/shBrushJScript.js')}}"></script>
<script src="{{asset('assets/base/syntax-highlighter/shBrushBash.js')}}"></script>
@stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/api/details/page.css')}}">
<script src="{{asset('assets/pages/api/details/page.js')}}"></script>
@stop

@section('content')
<div class="body">
    <div class="doc-box">
        <h1>API 库</h1>

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
                        <a class="hint-link">{{$currentDetail['url']}}</a>
                    </dd>

                    <dt>支持格式</dt>
                    <dd>{{$currentDetail['data-type']}}</dd>

                    <dt>HTTP请求方式</dt>
                    <dd>{{$currentDetail['http-method']}}</dd>

                    <dt>是否需要登录</dt>
                    <dd>{{$currentDetail['login']}}</dd>

                    <dt>IP限制</dt>
                    <dd>{{$currentDetail['ip-limit']}}</dd>

                    <dt>请求参数<span style="font-size: 12px;">（各个参数请进行URL 编码，编码时请遵守 <a href="http://tools.ietf.org/html/rfc1738" target="_blank">RFC 1738</a>）</span></dt>
                    <dd>
                        <div>
                            <label>1. 公有参数</label>

                            <div style="margin: 10px 0">
                                @if (!isset($currentDetail['public-params']))
                                    <label>发送请求时必须传入公共参数，详见公共参数说明。</label>
                                @else
                                    @if (!(isset($currentDetail['public-params']['tip']) && $currentDetail['public-params']['tip'] === false))
                                    <label>发送请求时必须传入公共参数，详见公共参数说明。</label>
                                    @endif

                                    @if (count($currentDetail['public-params']['list']) > 0)
                                    <table class="info-table" style="margin: 10px 0;">
                                        <thead>
                                        <tr>
                                            <th>参数名称</th>
                                            <th width="100">是否必须</th>
                                            <th width="100">类型</th>
                                            <th width="400">描述</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($currentDetail['public-params']['list'] as $params)
                                        <tr>
                                            <td style="text-align: left;">{{$params['name']}}</td>
                                            <td>{{$params['required']}}</td>
                                            <td>{{$params['type']}}</td>
                                            <td style="text-align: left;">{{$params['desc']}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            @endif
                        </div>

                        <div>
                            <label>2. 私有参数</label>
                            <table class="info-table" style="margin: 10px 0;">
                                <thead>
                                <tr>
                                    <th>参数名称</th>
                                    <th width="100">是否必须</th>
                                    <th width="100">类型</th>
                                    <th width="400">描述</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (count($currentDetail['private-params']) > 0)
                                @foreach ($currentDetail['private-params'] as $params)
                                <tr>
                                    <td style="text-align: left;">{{$params['name']}}</td>
                                    <td>{{$params['required']}}</td>
                                    <td>{{$params['type']}}</td>
                                    <td style="text-align: left;">{{$params['desc']}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">无</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </dd>

                    <dt>请求示例</dt>
                    <dd>
                        @foreach ($currentDetail['examples'] as $example)
                        <div>
                            @if (isset($example['label']))
                            <label>{{$example['label']}}</label>
                            @endif

                            <div class="bash-examples">
                                <pre class="brush: bash"><?php if (isset($example['code'])) {echo $example['code'];} else {echo ' ';}?></pre>
                            </div>
                        </div>
                        @endforeach
                    </dd>

                    <dt>返回字段说明</dt>
                    <dd>
                        @if (is_array($currentDetail['returns-field']))
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
                            @if (count($currentDetail['returns-field']) > 0)
                            @foreach ($currentDetail['returns-field'] as $field)
                            <tr>
                                <td style="text-align: left;">{{$field['name']}}</td>
                                <td>{{$field['required']}}</td>
                                <td>{{$field['type']}}</td>
                                <td style="text-align: left;">{{$field['desc']}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">无</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        @else
                        {{$currentDetail['returns-field']}}
                        @endif
                    </dd>

                    @foreach ($currentDetail['returns'] as $returns)
                        @if (isset($returns['title']))
                        <dt>{{$returns['title']}}</dt>
                        @endif

                        @foreach ($returns['list'] as $list)
                        <dd>
                            @if (isset($list['label']))
                            <label>{{$list['label']}}</label>
                            @endif

                            <div>
                                <pre class="brush: js"><?php if (isset($list['code'])) {echo $list['code'];} else {echo ' ';}?></pre>
                            </div>
                        </dd>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop