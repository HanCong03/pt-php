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
                    <li class="active"><a href="{{route('api-index')}}">API概览</a></li>
                    @foreach ($apis as $api)
                    <li class="sub-menu">
                        <label>{{$api['name']}}</label>
                        <ul>
                            @foreach ($api['children'] as $child)
                            <li><a href="/document/api/{{$child['classify']}}">{{$child['name']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="content-box">
                @foreach ($apis as $level1=>$api)
                <div class="api-classify">

                    <h2>{{$api['name']}}</h2>

                    <div class="inner-content-box">
                        <div class="base-api-box" href="#">
                            @foreach ($api['children'] as $level2=>$apiList1)
                            <a class="api-link" href="#{{$level1}}.{{$level2}}">{{$apiList1['name']}}</a>
                            @endforeach
                        </div>

                        @foreach ($api['children'] as $level3=>$apiList1)
                        <div class="table-box">
                            <h3><a name="{{$level1}}.{{$level3}}">{{$apiList1['name']}}</a></h3>

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
                                    @foreach ($apiList1['children'] as $apiList2)
                                    <tr>
                                        <td rowspan={{count($apiList2['children'])}}>{{$apiList2['name']}}</td>
                                        <td>{{$apiList2['children'][0]['type']}}</td>
                                        <td class="left">{{$apiList2['children'][0]['detail']['desc']}}</td>
                                        <td class="left"><a href="/document/api/{{str_replace('/', '.', $apiList2['children'][0]['name'])}}" class="hint-link">{{$apiList2['children'][0]['name']}}</a></td>
                                    </tr>
                                        @foreach ($apiList2['children'] as $apiIndex=>$apiItem)
                                            @if ($apiIndex !== 0)
                                            <tr>
                                                <td>{{$apiItem['type']}}</td>
                                                <td class="left">{{$apiItem['detail']['desc']}}</td>
                                                <td class="left"><a href="/document/api/{{str_replace('/', '.', $apiItem['name'])}}" class="hint-link">{{$apiList2['children'][0]['name']}}</a></td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop