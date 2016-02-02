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

class VerifyCodeController extends Controller {
    public function refresh() {
        $username = request()->input('username');
        $result = API::refreshVerifyCode($username);

        if (isset($result['error'])) {
            return response()->json($result);
        }

        return response()->json([]);
    }

    // 重置密码时的验证码
    public function refreshResetCode() {
        $phone = request()->input('username');
        $result = API::refreshResetPassportVerifyCode($phone);

        if (isset($result['error'])) {
            return response()->json($result);
        }

        session([
            'resetRecord' => [
                'phone' => $phone,
                'verifyCode' => $result['data']['code']
            ]
        ]);

        return response()->json([]);
    }
}