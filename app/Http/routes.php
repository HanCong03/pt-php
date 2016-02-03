<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// 页面路由
Route::group([
    'middleware' => ['web'],
    'namespace' => 'Pages'
], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'IndexController@index'
    ]);

    Route::get('login', [
        'as' => 'login',
        'uses' => 'PassportController@login'
    ]);

    Route::get('code', [
        'uses' => 'PassportController@code'
    ]);

    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'PassportController@logout'
    ]);

    Route::get('register', [
        'as' => 'register',
        'uses' => 'PassportController@register'
    ]);

    Route::get('agreement', [
        'as' => 'agreement',
        'uses' => 'PageController@agreement'
    ]);

    Route::get('contacts', [
        'as' => 'contacts',
        'uses' => 'PageController@contacts'
    ]);

    Route::get('verify-code-faq', [
        'as' => 'verify-code-faq',
        'uses' => 'PageController@verifyCodeFaq'
    ]);

    Route::group([
        'middleware' => ['unlogin']
    ], function () {
        // 忘记密码
        Route::get('forget', [
            'as' => 'forget',
            'uses' => 'PassportController@forget'
        ]);

        Route::any('forget-validate', [
            'as' => 'forget-validate',
            'uses' => 'PassportController@forgetValidate'
        ]);

        Route::any('reset-password', [
            'as' => 'reset-password',
            'uses' => 'PassportController@resetPassword'
        ]);

        Route::get('reset-success', [
            'as' => 'reset-success',
            'uses' => 'PassportController@resetSuccess'
        ]);
    });

    // 开发者中心
    Route::group([
        'prefix' => 'developer',
        'middleware' => ['login']
    ], function () {
        Route::get('/', [
            'as' => 'developer-index',
            'uses' => 'DeveloperController@index'
        ]);

        Route::get('certification', [
            'as' => 'developer-certification',
            'uses' => 'DeveloperController@certification'
        ]);

        Route::get('avatar', [
            'as' => 'avatar',
            'uses' => 'DeveloperController@avatar'
        ]);
    });

    // 文档类
    Route::group([
        'prefix' => 'document'
    ], function () {

        Route::get('/', [
            'as' => 'document-index',
            'uses' => 'DocumentController@index'
        ]);

        Route::get('service-agreement', [
            'as' => 'service-agreement',
            'uses' => 'DocumentController@serviceAgreement'
        ]);

        Route::get('specification', [
            'as' => 'specification',
            'uses' => 'DocumentController@specification'
        ]);

        Route::get('flow', [
            'as' => 'flow',
            'uses' => 'DocumentController@flow'
        ]);

        Route::get('guide', [
            'as' => 'guide',
            'uses' => 'DocumentController@guide'
        ]);

        Route::get('faq', [
            'as' => 'faq',
            'uses' => 'DocumentController@faq'
        ]);

        Route::get('recent-update', [
            'as' => 'recent-update',
            'uses' => 'DocumentController@recentUpdate'
        ]);

        Route::get('api', [
            'as' => 'api-index',
            'uses' => 'APIController@index'
        ]);

        Route::get('api/{classify}', [
            'uses' => 'APIController@classify'
        ]);

        Route::get('api/{classify}/{api_name}', [
            'uses' => 'APIController@detail'
        ]);
    });
});


// 接口路由
Route::group([
    'middleware' => ['web'],
    'namespace' => 'API',
    'prefix' => 'api-data'
], function () {
    Route::group(['middleware' => ['unlogin']], function () {
        Route::get('refresh-verify-code', 'VerifyCodeController@refresh');
        Route::get('refresh-reset-verify-code', 'VerifyCodeController@refreshResetCode');

        Route::post('login', [
            'as' => 'login-api',
            'uses' => 'PassportController@login'
        ]);

        Route::post('register', [
            'as' => 'register-api',
            'uses' => 'PassportController@register'
        ]);

        Route::post('reset-pwd', [
            'as' => 'reset-pwd-api',
            'uses' => 'PassportController@reset'
        ]);
    });
});