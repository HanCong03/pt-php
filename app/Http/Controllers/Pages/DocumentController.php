<?php
/**
 * Created by IntelliJ IDEA.
 * User: hancong
 * Date: 16/1/30
 * Time: 上午1:20
 */

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Log;

class DocumentController extends Controller {
    private $menu;

    public function __construct() {
        $this->menu = [
            [
                'label' => '平台概述',
                'link' => route('document-index')
            ], [
                'label' => '新手指引',
                'sub' => [
                    [
                        'label' => '应用接入新手引导',
                        'link' => 'xxx'
                    ], [
                        'label' => '应用接入流程',
                        'link' => 'xxx'
                    ]
                ]
            ], [
                'label' => '平台服务协议',
                'link' => route('service-agreement')
            ], [
                'label' => '平台规范',
                'link' => route('specification')
            ], [
                'label' => 'FAQ',
                'link' => route('faq')
            ], [
                'label' => '最近更新',
                'link' => route('recent-update')
            ]
        ];

        view()->share('menu', $this->menu);
        view()->share('navName', '文档中心');
    }

    public function index() {
        return view('document/index', [
            'activeLabel' => '平台概述'
        ]);
    }

    public function serviceAgreement() {
        return view('document/agreement', [
            'activeLabel' => '平台服务协议'
        ]);
    }

    public function specification() {
        return view('document/specification', [
            'activeLabel' => '平台规范'
        ]);
    }

    public function faq() {
        return view('document/faq', [
            'activeLabel' => 'FAQ'
        ]);
    }

    public function recentUpdate() {
        return view('document/recent-update', [
            'activeLabel' => '最近更新'
        ]);
    }
}