<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Model;

use Think\Model;

class UserModel extends Model
{

    protected $tableName = '';

    public function checkUserName($username)
    {
        $map['username']->$username;
        $count = M('admin')->where($map)->find();
        if ($count) {

            $res['status'] = 0;
            $res['message'] = '用户名校验成功';

        } else {
            $res['status'] = -1;
            $res['message'] = '用户名校验失败';
        }
        return $res;

    }

    /**
     * 用户登录
     * @param  [string] $username [用户名]
     * @param  [string] $password [密码]
     * @return [json]           [返回json]
     */
    public function login($username, $password)
    {
        $map['username'] = $username;
        $map['password'] = md5($password);

        $count = M('admin')->where($map)->find();
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

    public function userInfo($token)
    {

        $token = 'admin';
        $map['username'] = $token;

        $count = M('admin')->where($map)->find();
        if ($count) {

            $res['status'] = 0;
            $data['roles'] = $count['admin_type'];
            $data['name'] = $count['realname'];
            $data['avatar'] = $count['avatar'];
            $res['data'] = $data;
            return $res;

        } else {
            $res['status'] = -1;
            $message['message'] = "用户信息调用失败";
        }
        return $res;
    }
}
