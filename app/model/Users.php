<?php
/**
 * @Description :
 *
 * @Date        : 2024/6/19 下午7:08
 * @Author      : Jader
 */

namespace app\model;

use think\Model;

class Users extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'user';

    // 隐藏字段
    protected $hidden = ['password'];

    // 定义时间戳字段名，如果不使用默认的 created_at 和 updated_at
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}