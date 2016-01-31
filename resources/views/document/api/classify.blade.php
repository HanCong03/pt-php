@extends('_layout.base')

@section('title')API库 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/api/index/page.css')}}">
<script src="{{asset('assets/pages/api/index/page.js')}}"></script>
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
                            <li class="{{$child['name'] === $current['name'] ? 'active' : ''}}"><a href="/document/api/{{$child['classify']}}">{{$child['name']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="content-box">
                <div class="api-classify">
                    <h2>{{$current['name']}}</h2>

                    <div class="inner-content-box">
                        <div class="table-box" style="margin-top: 50px;">
                            <table>
                                <thead>
                                <tr>
                                    <th width="170">接口分类</th>
                                    <th width="100">读写</th>
                                    <th width="320">接口功能说明</th>
                                    <th width="240">接口详细文档</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($current['children'] as $api)
                                    <tr>
                                        <td rowspan={{count($api['children'])}}>{{$api['name']}}</td>
                                        <td>{{$api['children'][0]['type']}}</td>
                                        <td class="left">{{$api['children'][0]['detail']['desc']}}</td>
                                        <td class="left"><a href="/document/api/{{$current['classify']}}/{{str_replace('/', '.', $api['children'][0]['name'])}}" class="hint-link">{{$api['children'][0]['name']}}</a></td>
                                    </tr>
                                        @foreach ($api['children'] as $apiIndex=>$apiItem)
                                            @if ($apiIndex !== 0)
                                            <tr>
                                                <td>{{$apiItem['type']}}</td>
                                                <td class="left">{{$apiItem['detail']['desc']}}</td>
                                                <td class="left"><a href="/document/api/{{$current['classify']}}/{{str_replace('/', '.', $apiItem['name'])}}" class="hint-link">{{$api['children'][0]['name']}}</a></td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop