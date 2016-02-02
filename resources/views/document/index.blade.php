@extends('_layout.doc')

@section('title')文档中心 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/doc/index/page.css')}}">
<script src="{{asset('assets/pages/doc/index/page.js')}}"></script>
@stop

@section('document-content')
    <h2 class="border">什么是金桐开放平台</h2>

    <div class="inner-content-box">
        <div class="box">
            <p>
                金桐开放平台是基于海量的数据和强大的功能组件，接入第三方合作伙伴服务，向第三方用户提供丰富应用和完善服务的开放平台。将你的服务接入金桐开放平台，有助于推广产品，增加网站应用的流量、拓展新用户，获得收益。
            </p>

            <h3>平台核心能力</h3>

            <p>
                最前沿跨领域的生态链，主要涉及的行业覆盖教育，医疗，金融，工业等领域。
            </p>

            <img src="/assets/doc/doc1.png">

            <p>平台特有的强大功能组件：</p>

            <img src="/assets/doc/doc2.png">

            <p> 四大维度，从人、组织、知识、事件四大维度，解构人们生活工作的生态圈，实现资源对接更精准、快捷、方便；</p>

            <p>
                四大组件，通过目录、标签、关联、和权限四大组件实现资源系统化、人性化管理；
            </p>
            <p>
                七大动作，存储、分享、交换、执行、管理、对接、协作七大动作，涵盖整个生态操作和业务流程；
            </p>
            <p>
                桐人工具，通过项目管理，组织管理，任务协作，真正实现无组织、组织化管理。
            </p>
            <p>
                大数据分析与存储
            </p>

            <img src="/assets/doc/doc3.png">

            <p>
                安全稳定的云计算基础服务，超大规模分布式架构、低能耗数据中心、超强云安全；大规模的计算与分析，提供数据处理，分析，增值能力，挖掘数据潜在价值；海量数据存储，非结构化数据存储与网络加速。
            </p>
        </div>

        <div>
            <h3>我们可以帮你做什么</h3>
            <ul>
                <li>第三方工具类应用开发</li>
                <li>第三方服务类应用接入</li>
            </ul>
        </div>

        <div>
            <h3>成功案例</h3>
            <ul>
                <li>线索</li>
                <li>会议模式</li>
            </ul>
        </div>
    </div>
@stop