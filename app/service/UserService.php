<?php
/**
 * @Description :
 *
 * @Date        : 2024/6/20 上午10:57
 * @Author      : Jader
 */
namespace app\service;

use app\dao\UserDao;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use think\facade\Config;

class UserService
{
    protected $userDao;
    protected $key;

    public function __construct(UserDao $userDao)
    {
        $this->userDao = $userDao;
        $this->key = Config::get('auth.jwt_key');
    }

    public function login($username, $password)
    {
        $user = $this->userDao->findByUsernameAndPassword($username, md5($password));
        if ($user) {
            $payload = [
                'iss' => 'your_domain.com',
                'iat' => time(),
                'exp' => time() + 3600,
                'uid' => $user->id,
            ];
            $token = JWT::encode($payload, $this->key, 'HS256');

            return ['status' => 'success', 'token' => $token];
        } else {
            return ['status' => 'error', 'message' => 'Invalid username or password'];
        }
    }

    public function getUserInfo($authHeader)
    {
        if (!$authHeader) {
            return ['status' => 'error', 'message' => 'Authorization header not found'];
        }

        list($jwt) = sscanf($authHeader, 'Bearer %s');
        if (!$jwt) {
            return ['status' => 'error', 'message' => 'Invalid token format'];
        }

        try {
            $decoded = JWT::decode($jwt, new Key($this->key, 'HS256'));
            $userId = $decoded->uid;
            $user = $this->userDao->findById($userId);
            if ($user) {
                return ['status' => 'success', 'data' => $user];
            } else {
                return ['status' => 'error', 'message' => 'User not found'];
            }
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => 'Invalid token'];
        }
    }
}