<?php
/**
 * @Description :
 *
 * @Date        : 2024/6/19 下午6:56
 * @Author      : Jader
 */

namespace app\controller;

use app\BaseController;
use app\model\Users;
use Firebase\JWT\JWT;
use think\facade\Request;
use think\facade\Config;

class User extends BaseController
{
    // 登录接口
    public function login()
    {
        $username = Request::post('username');
        $password = Request::post('password');

        // 验证用户名和密码
        $user = Users::where('username', $username)->where('password', md5($password))->find();
        if ($user) {
            // 生成 JWT
            $payload = [
                'iss' => 'your_domain.com',
                'iat' => time(),
                'exp' => time() + 3600,
                'uid' => $user->id,
            ];
            $token = JWT::encode($payload, Config::get('auth.jwt_key'), 'HS256');

            return json(['status' => 'success', 'token' => $token]);
        } else {
            return json(['status' => 'error', 'message' => 'Invalid username or password']);
        }
    }
}