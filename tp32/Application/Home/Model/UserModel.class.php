<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Model;

use Think\Model;

class UserModel extends Model
{
    public function checkPsd($username, $password)
    {
        $res = $username + $password;
        return $res;
    }
}
