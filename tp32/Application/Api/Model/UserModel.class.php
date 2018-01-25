<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Model;

use Think\Model;

class UserModel extends Model
{

    protected $tableName = '';

    /**
     * 用户登录
     * @param  [string] $username [用户名]
     * @param  [string] $password [密码]
     * @return [json]           [返回json]
     */
    public function login($username, $password)
    {
        $map['username'] = $username;
        $map['password'] = $password;

        $count = M('admin')->where($map)->count();
        if ($count) {
            $res['status'] = 0;
            $res['token'] = $username;
            $res['message'] = '登录成功';
        } else {
            $res['status'] = -1;
            $res['message'] = '密码错误';
        }
        return $res;
    }

    /**
     * [查看是否存在用户名]
     * @param  [string] $username [用户名]
     * @return [json]           [返回json结果]
     */
    public function checkUserName($username)
    {

        $map['username'] = $username;
        $count = M('admin')->where($map)->count();
        if ($count) {
            $res['status'] = 0;
            $res['message'] = '用户名校验成功';

        } else {
            $res['status'] = -1;
            $res['message'] = '不存在的用户名';

        }
        return $res;

    }

}
