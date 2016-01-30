@extends('_layout.base')

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/index/page.css')}}">
<script src="{{asset('assets/pages/index/page.js')}}"></script>
@stop

@section('content')
<div class="banner"></div>

<div class="components-box details">
    <h2>金桐特有强大功能组件</h2>
    <h3>Gin Tong unique power components</h3>

    <ul class="components-details">
        <li class="weidu">
            <dt>四个维度</dt>
            <dd>
                整个生态由人、组织、知识、<br>事件串联
            </dd>
        </li>

        <li class="zujian">
            <dt>四大组件</dt>
            <dd>
                分类管理，权限区分，<br>相互关联
            </dd>
        </li>

        <li class="dongzuo">
            <dt>七个动作</dt>
            <dd>
                涵盖整个生态操作和业<br>务流程
            </dd>
        </li>

        <li class="gongju">
            <dt>桐人工具</dt>
            <dd>
                真正实现无组织、组织化<br>管理
            </dd>
        </li>
    </ul>
</div>

<div class="api-box details">
    <h2>核心API接口</h2>
    <h3>Gin Tong unique power components</h3>

    <ul class="api-details">
        <li class="api-details-item1">
            <dt>核心API接口</dt>
            <dd>
                <ul>
                    <li>用户接口</li>
                    <li>收藏接口</li>
                    <li>评论接口</li>
                </ul>
                <ul>
                    <li>安全性接口</li>
                    <li>分享接口</li>
                    <li>消息提醒接口</li>
                </ul>
                <a>VIEW MORE &gt;</a>
            </dd>
        </li>

        <li class="api-details-item2">
            <dt>核心API接口</dt>
            <dd>
                <ul>
                    <li>人脉接口</li>
                    <li>知识接口</li>
                    <li>会议接口</li>
                </ul>
                <ul>
                    <li>组织接口</li>
                    <li>事务接口</li>
                    <li>畅聊接口</li>
                </ul>
                <a>VIEW MORE &gt;</a>
            </dd>
        </li>

        <li class="api-details-item3">
            <dt>核心API接口</dt>
            <dd>
                <ul>
                    <li>对接接口</li>
                    <li>存储接口</li>
                    <li>协作接口</li>
                </ul>
                <ul>
                    <li>关联接口</li>
                    <li>权限接口</li>
                    <li>标签接口</li>
                </ul>
                <a>VIEW MORE &gt;</a>
            </dd>
        </li>
    </ul>
</div>

<div class="data-box details">
    <h2>大数据分析与存储</h2>
    <h3>Gin Tong unique power components</h3>

    <div class="data-details">
        <ul class="service-list">
            <li class="service-item1 active">
                <span>安全、稳定的云计算基础服务</span>
            </li>
            <li class="service-item2">
                <span>大规模的计算与分析</span>
            </li>
            <li class="service-item3">
                <span>海量数据存储</span>
            </li>
        </ul>

        <div class="service-content">
            <ul class="service-content-item1 show">
                <li>超大规模分布式架构、低能耗数据中心、超强云安全1</li>
            </ul>
            <ul class="service-content-item2">
                <li>超大规模分布式架构、低能耗数据中心、超强云安全2</li>
            </ul>
            <ul class="service-content-item3">
                <li>超大规模分布式架构、低能耗数据中心、超强云安全3</li>
            </ul>
        </div>
    </div>
</div>

<div class="case-box details">
    <h2>合作案例</h2>
    <h3>Gin Tong unique power components</h3>

    <table class="case-details">
        <tbody>
        <tr>
            <td class="case-icon-huaban"><span>花瓣</span></td>
            <td class="case-icon-360"><span>360</span></td>
            <td class="case-icon-huaban"><span>花瓣</span></td>
            <td class="case-icon-360"><span>360</span></td>
        </tr>
        <tr>
            <td class="case-icon-huaban"><span>花瓣</span></td>
            <td class="case-icon-360"><span>360</span></td>
            <td class="case-icon-huaban"><span>花瓣</span></td>
            <td class="case-icon-360"><span>360</span></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="friendship-box details">
    <h2>友情链接</h2>
    <h3>Gin Tong unique power components</h3>

    <table class="friendship-details">
        <tbody>
        <tr>
            <td class="link-jintong"><a href="#"><span>金桐网</span></a></td>
            <td class="link-jintong"><a href="#"><span>金桐网</span></a></td>
            <td class="link-jintong"><a href="#"><span>金桐网</span></a></td>
            <td class="link-jintong"><a href="#"><span>金桐网</span></a></td>
        </tr>
        </tbody>
    </table>
</div>
@stop