@extends('_layout.doc')

@section('title')文档中心 - @stop

@section('page-assets')
<link rel="stylesheet" href="{{asset('assets/pages/doc/faq/page.css')}}">
<script src="{{asset('assets/pages/doc/faq/page.js')}}"></script>
@stop

@section('document-content')
    <h2>
        FAQ
        <div>
            <button class="std-btn question-btn">我要提问</button>
        </div>
    </h2>

    <div class="inner-content-box">
        <div class="faq-box">

            <div class="faq-classify-box">
                <h3>网站接入认证</h3>
                <ul>
                    <li>
                        <h4>Q:　网站认证审核时间是多久？</h4>
                        <p>A：3个工作日。</p>
                    </li>
                    <li>
                        <h4>Q:　修改认证说明审核时间是多久？</h4>
                        <p>A：2个工作日。</p>
                    </li>
                    <li>
                        <h4>Q:　服务器在国外没有ICP备案怎么办？</h4>
                        <p>A：平台暂时视ICP备案是网站认证申请的基本条件，不能缺失。</p>
                    </li>
                </ul>
            </div>

            <div class="faq-classify-box">
                <h3>应用创建与管理</h3>
                <ul>
                    <li>
                        <h4>Q:　我创建了网站应用，怎样查看App Key，App Secret？</h4>
                        <p>A：待定。</p>
                    </li>
                    <li>
                        <h4>Q:　App Secret泄露了怎么办？</h4>
                        <p>A：待定。</p>
                    </li>
                    <li>
                        <h4>Q:　在“部署”状态，无法点击“下一步”怎么办？</h4>
                        <p>A：待定。</p>
                    </li>
                    <li>
                        <h4>Q:　请问App key的有效期是多长时间？</h4>
                        <p>A：应用开发者在申请应用之后，如90天内没有用户使用，金桐开放平台有权利停止该应用接口使用权限并删除该应用。</p>
                    </li>
                    <li>
                        <h4>Q:　请问个人用户申请和组织用户申请的流程有什么不同吗？</h4>
                        <p>A：所有开发者和网站主申请流程是一致的，只有在提交资质时有差别。</p>
                    </li>
                    <li>
                        <h4>Q: 强烈要求已通过审核的开发者信息部分隐藏。不然黑客窃取信息可太方便了。尤其是身份证的扫描件？</h4>
                        <p>A：待您好，平台不会公开开发者的信息定。</p>
                    </li>
                    <li>
                        <h4>Q: 如果在使用API时发现问题，应该如何自查？</h4>
                        <p>A：请在应用中抓取接口返回的详细错误信息，根据对应的错误代码到常见错误代码及释义进行查看。</p>
                    </li>
                </ul>
            </div>
        </div>

        <div id="questionDialog" class="question-dialog">
            <div class="dialog-head">
                <h1>我要提问</h1>
                <button class="close-dialog-btn"></button>
            </div>

            <div class="dialog-body">
                <form action="/api/doc/question" method="POST" name="question-form">
                    <textarea placeholder="请输入您的问题..." class="question-input" spellcheck="false"></textarea>
                    <i class="message">请输入200字内的内容</i>
                </form>
            </div>

            <div class="dialog-foot">
                <button class="std-btn ok-btn">确定</button>
                <button class="std-btn cancel-btn">取消</button>
            </div>

            <div class="tip-box">
                <i class="tip-message"></i>
                <button class="std-btn tip-btn">确定</button>
            </div>
        </div>
    </div>
</div>
@stop