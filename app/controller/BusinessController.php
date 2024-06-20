<?php
/**
 * @Description :
 *
 * @Date        : 2024/6/19 下午6:56
 * @Author      : Jader
 */

namespace app\controller;

use app\BaseController;
use think\facade\Request;

class BusinessController extends BaseController
{
    public function test()
    {
        $user = Request::instance()->user;
        // 业务逻辑
        return json(['status' => 'success', 'data' => 'test']);
    }
}