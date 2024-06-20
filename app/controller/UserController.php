<?php
/**
 * @Description :
 *
 * @Date        : 2024/6/19 下午6:56
 * @Author      : Jader
 */

namespace app\controller;

use app\BaseController;
use app\service\UserService;
use think\facade\Request;

class UserController extends BaseController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \think\response\Json
     */
    public function login()
    {
        $data = Request::post();
        $result = $this->userService->login($data['username'], $data['password']);

        return json($result);
    }

    /**
     * @return \think\response\Json
     */
    public function getUserInfo()
    {
        $authHeader = Request::header('Authorization');
        $result = $this->userService->getUserInfo($authHeader);

        return json($result);
    }
}