<?php

/**
 * Created by IntelliJ IDEA.
 * User: hancong
 * Date: 16/1/30
 * Time: 上午2:12
 */
namespace APP\Http\API;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Session;
use Log;

class API {
    private static $client;

//    const HOST = 'http://api.test.gintong.com/';
    const HOST = 'http://api.gintong.com/';

    public static function __init() {
        self::$client = new Client();
    }

    public static function isLogin() {
        return Session::has('user');
    }

    public static function getUserInfo($accessToken) {
        return self::request('GET', self::HOST . 'user/user/getUserDetail', [
            'query' => [
                'access_token' => $accessToken
            ]
        ]);
    }

    public static function login($data) {
        return self::request('POST', self::HOST . 'user/user/login', [
            'form_params' => $data
        ]);
    }

    public static function refreshVerifyCode($passport) {
        return self::request('GET', self::HOST . 'user/user/getIdentifyingCode', [
            'query' => [
                'passport' => $passport
            ]
        ]);
    }

    /**
     * 发送并返回找回密码验证码
     * @param $phone 手机号
     * @return 格式化后的接口调用结果
     */
    public static function refreshResetPassportVerifyCode($phone) {
        return self::request('GET', self::HOST . 'user/user/getBackPasswordCode', [
            'query' => [
                'passport' => $phone
            ]
        ]);
    }

    public static function register($data) {
        // 重置用户类型为个人用户
        $data['userType'] = 0;

        return self::request('POST', self::HOST . 'user/user/register', [
            'form_params' => $data
        ]);
    }

    public static function resetPassword($data) {
        return self::request('POST', self::HOST . 'user/user/resetPassword ', [
            'form_params' => $data
        ]);
    }

    private static function request($method, $url, $params=null) {
        try {
            $res = self::$client->request($method, $url, $params);
            $res = json_decode((string)$res->getBody(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $res = json_decode((string)$e->getResponse()->getBody(), true);
            } else {
                return [
                    'error' => [
                        'message' => 'api error'
                    ]
                ];
            }
        }

        return self::formatResult($res);
    }

    private static function formatResult($res) {
        if (isset($res['error'])) {
            return $res;
        } else if ($res['status'] === 0) {
            return [
                'error' => [
                    'message' => $res['message']
                ]
            ];
        }

        return [
            'data' => $res
        ];
    }
}

API::__init();