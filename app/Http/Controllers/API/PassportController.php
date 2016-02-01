<?php
/**
 * Created by IntelliJ IDEA.
 * User: hancong
 * Date: 16/1/30
 * Time: 上午1:20
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\API\API;
use Log;

class PassportController extends Controller {
    public function login() {
        $requestData = request()->only('username', 'password');

        $result = API::login([
            'passport' => $requestData['username'],
            'password' => $requestData['password']
        ]);

        if (isset($result['error'])) {
            return response()->json($result);
        }

        $accessToken = $result['data']['access_token'];

        $userInfo = API::getUserInfo($accessToken);

        if (isset($userInfo['error'])) {
            return response()->json($result);
        }

        session([
            'user' => $userInfo['data'],
            'accessToken' => $accessToken
        ]);

        return response()->json([]);
    }

    public function register() {
        $requestData = request()->only('type', 'username', 'verify-code', 'pwd');

        $params = [
            'type' => $requestData['type'],
            'code' => $requestData['verify-code'],
            'passport' => $requestData['username'],
            'password' => $requestData['pwd']
        ];

        $result = API::register($params);

        return response()->json($result);
    }

    public function reset() {
        $requestData = request()->only('pwd', 'confirm-pwd', 'verify-code', 'passport');

        $params = [
            'passport' => $requestData['passport'],
            'code' => $requestData['verify-code'],
            'password' => $requestData['pwd'],
            'confirmPassword' => $requestData['confirm-pwd']
        ];

        $result = API::resetPassword($params);

        if (!isset($result['error'])) {
            // session里写入数据,防止重置成功页面被重复刷新
            session()->flash('resetPasswordFlag', 'true');

            $result['data']['redirect'] = route('reset-success');
        }

        return response()->json($result);
    }
}