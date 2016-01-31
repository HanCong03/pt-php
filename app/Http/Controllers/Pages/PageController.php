<?php
/**
 * Created by IntelliJ IDEA.
 * User: hancong
 * Date: 16/1/30
 * Time: 上午1:20
 */

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class PageController extends Controller {
    public function contacts() {
        view()->share('navName', '联系我们');
        return view('contacts');
    }

    public function verifyCodeFaq() {
        return view('verify-code-faq');
    }

    public function agreement() {
        return view('agreement');
    }
}