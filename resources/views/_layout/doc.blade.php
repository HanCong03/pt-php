@extends('_layout.base')

@section('content')
<div class="body">
    <div class="doc-box">
        <h1>文档中心</h1>

        <div class="doc-container">
            <div class="left-side">
                <ul>
                @foreach ($menu as $item)
                    @if (isset($item['sub']))
                        <li class="sub-menu {{isset($activeSubmenu) ? 'active opened' : ''}}">
                            <label>{{$item['label']}}</label>
                            <ul>
                                @foreach ($item['sub'] as $subItem)
                                    <li {{$activeLabel === $subItem['label'] ? 'class=active' : ''}}>
                                        <a href="{{$subItem['link']}}">{{$subItem['label']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li {{$activeLabel === $item['label'] ? 'class=active' : ''}}><a href="{{$item['link']}}">{{$item['label']}}</a></li>
                    @endif
                @endforeach
                </ul>
            </div>
            <div class="content-box">
                @yield('document-content')
            </div>
        </div>
    </div>
</div>
@stop