<?php
/**
 * Created by IntelliJ IDEA.
 * User: hancong
 * Date: 16/1/30
 * Time: 上午1:20
 */

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class DeveloperController extends Controller {
    private $menu;

    public function __construct() {
        $this->menu = [
            [
                'label' => '基本资料',
                'link' => route('developer-index')
            ], [
                'label' => '开发者认证',
                'link' => route('developer-certification')
            ], [
                'label' => '我的应用',
                'link' => route('specification')
            ], [
                'label' => '退出登录',
                'link' => route('faq')
            ]
        ];

        view()->share('menu', $this->menu);
    }

    public function index() {
        return view('developer/index', [
            'activeLabel' => '基本资料'
        ]);
    }

    public function avatar() {
        return view('developer/certification/avatar', [
            'activeLabel' => '基本资料'
        ]);
    }

    public function certification() {
        $type = request()->input('type', 1);

        // 未认证
        if ($type == 1) {
            return view('developer/certification/not-certified', [
                'activeLabel' => '开发者认证'
            ]);

        // 审核中
        } else if ($type == 2) {
            return view('developer/certification/review', [
                'activeLabel' => '开发者认证'
            ]);

        // 认证成功
        } else if ($type == 3) {
            return view('developer/certification/success', [
                'activeLabel' => '开发者认证'
            ]);

        // 认证失败
        } else if ($type == 4) {
            return view('developer/certification/failure', [
                'activeLabel' => '开发者认证'
            ]);
        }
    }
}