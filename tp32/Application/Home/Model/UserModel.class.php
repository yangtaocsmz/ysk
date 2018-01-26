<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Model;

use Think\Model;

class UserModel extends Model
{
    public function checkUserName($username)
    {
        $res = M('admin')->where('username=' . $username)->find();
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
}
