<?php
/**
 * Created by IntelliJ IDEA.
 * User: hancong
 * Date: 16/1/30
 * Time: 上午1:20
 */

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\API\API;
use Log;
use Session;

class PassportController extends Controller {
    public function login() {
        if (API::isLogin()) {
            return redirect()->route('index');
        }

        return view('login');
    }

    public function register() {
        if (API::isLogin()) {
            return redirect()->router('index');
        }

        return view('register');
    }

    public function forget() {
        return view('forget');
    }

    public function forgetValidate() {
        if (!request()->has('username') || !request()->isMethod('post')) {
            return abort(403);
        }

        $passport = request()->input('username');

        if (preg_grep('/^1[0-9]{10}$/', [$passport])) {
            return view('forget-phone-validate')->with([
                'passport' => $passport
            ]);
        } else {
            return view('forget-email-validate')->with([
                'passport' => $passport
            ]);
        }
    }

    public function resetPassword() {
        if (!request()->has('passport', 'verify-code')
            || !session()->has('resetRecord')
            || !request()->isMethod('post')) {

            return abort(403);
        }

        $passport = request()->input('passport');
        $verifyCode = request()->input('verify-code');

        $record = session()->get('resetRecord');

        if ($passport === $record['phone'] && $verifyCode === $record['verifyCode']) {
            session()->forget('resetRecord');

            return view('reset-password', [
                'verifyCode' => $verifyCode,
                'passport' => $passport
            ]);
        } else {
            return abort(403);
        }
    }

    public function resetSuccess() {
        if (!session()->has('resetPasswordFlag')) {
            return redirect()->route('index');
        }

        return view('reset-success');
    }
}