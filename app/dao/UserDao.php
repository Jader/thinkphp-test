<?php
/**
 * @Description :
 *
 * @Date        : 2024/6/20 上午10:57
 * @Author      : Jader
 */
namespace app\dao;

use app\model\Users;

class UserDao
{
    /**
     * @param $username
     * @param $password
     * @return array|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function findByUsernameAndPassword($username, $password)
    {
        return Users::where('username', $username)->where('password', $password)->find();
    }

    /**
     * @param $id
     * @return array|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function findById($id)
    {
        return Users::find($id);
    }
}