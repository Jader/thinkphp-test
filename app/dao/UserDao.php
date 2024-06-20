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
    public function findByUsernameAndPassword($username, $password)
    {
        return Users::where('username', $username)->where('password', $password)->find();
    }

    public function findById($id)
    {
        return Users::find($id);
    }
}