<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Controller;

use Think\Controller;

// header('Access-Control-Allow-Credentials:true');
// header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Content-Type,X-Token');

class UserController extends Controller
{
    /**
     * 验证用户名密码
     * @return [boolean] []
     */
    public function login()
    {
        $username = I('get.username');
        $password = I('get.password');
        if (!$username == null || !$password == null) {

            $res = D('User')->login($username, $password);
            $this->ajaxReturn($res);
        } else {
            $this->ajaxReturn(false);
        }
    }
    /**
     * [校验用户名]
     * @return [boolean] [description]
     */
    public function checkUserName()
    {
        $username = I('get.username');
        // $username = "admin";
        $res = D('User')->checkUserName($username);
        $this->ajaxReturn($res);

    }

    public function getUserInfo()
    {

        $token = I('get.token');
        if (!$token == null) {
            $res = D('User')->userInfo($token);

        } else {
            $res = false;
        }
        $this->ajaxReturn($res);
    }

    public function logOut()
    {

    }
}
