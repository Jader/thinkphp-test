<?php
/**
 * @Description :
 *
 * @Date        : 2024/6/19 下午6:50
 * @Author      : Jader
 */

namespace app\middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use think\facade\Config;
use app\model\Users;
use think\Response;

class AuthMiddleware
{
    public function handle($request, \Closure $next)
    {
        $authHeader = $request->header('Authorization');
        if (!$authHeader) {
            return Response::create(['status' => 'error', 'message' => 'Authorization header not found'], 'json', 401);
        }

        list($jwt) = sscanf($authHeader, 'Bearer %s');
        if (!$jwt) {
            return Response::create(['status' => 'error', 'message' => 'Invalid token format'], 'json', 401);
        }

        try {
            $key = Config::get('auth.jwt_key');
            $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
            $userId = $decoded->uid;

            $user = Users::find($userId);
            if (!$user) {
                return Response::create(['status' => 'error', 'message' => 'User not found'], 'json', 401);
            }

            // 将用户信息附加到请求对象
            $request->user = $user;

            return $next($request);
        } catch (\Exception $e) {
            return Response::create(['status' => 'error', 'message' => 'Invalid token'], 'json', 401);
        }
    }
}