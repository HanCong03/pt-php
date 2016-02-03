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

    public function logout() {
        if (API::isLogin()) {
            API::logout(session()->get('accessToken'));

            session()->flush();
            session()->regenerate();
        }

        return redirect()->route('index');
    }

    public function code() {
        if (!session()->has('resetRecord') && !session()->has('code')) {
            return '当前没有验证码';
        }

        $result = [];

        if (session()->has('resetRecord')) {
            array_push($result, '重置密码code:' . session()->get('resetRecord')['verifyCode']);
        }

        if (session()->has('code')) {
            array_push($result, '注册code:' . session()->get('code'));
        }

        return join('<br/>', $result);
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
            $result = API::refreshResetPassportVerifyCode($passport);

            // 发送验证邮件失败
            if (isset($result['error'])) {
                return view('forget-email-error', [
                    'message' => $result['error']['message']
                ]);
            }

            session([
                'resetRecord' => [
                    'email' => $passport,
                    'verifyCode' => $result['data']['code']
                ]
            ]);

            return view('forget-email-validate')->with([
                'passport' => $passport
            ]);
        }
    }

    public function resetPassword() {
        if (request()->has('email')) {
            return $this->__resetPasswordByEmail();
        } else {
            return $this->__resetPasswordByPhone();
        }
    }

    // 邮件验证
    public function __resetPasswordByEmail() {
        if (!request()->has('email', 'code')
            || !session()->has('resetRecord')
            || !request()->isMethod('get')) {

            return abort(403);
        }

        $passport = request()->input('email');
        $verifyCode = request()->input('code');
        $record = session()->get('resetRecord');

        if ($passport === $record['email'] && $verifyCode === $record['verifyCode']) {
            session()->forget('resetRecord');

            return view('reset-password', [
                'verifyCode' => $verifyCode,
                'passport' => $passport
            ]);
        } else {
            return abort(403);
        }
    }

    private function __resetPasswordByPhone() {
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