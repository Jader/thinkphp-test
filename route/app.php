<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

// 登录接口不需要验证
Route::post('user/login', 'User/login');

// 其他需要验证的业务接口
Route::group(function() {
    Route::get('business/test', 'Business/test');
    // 其他业务接口
})->middleware(\app\middleware\AuthMiddleware::class);