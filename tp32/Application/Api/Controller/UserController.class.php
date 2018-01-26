<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Controller;

use Think\Controller;

header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Origin:*');

class UserController extends Controller
{
    /**
     * 验证用户名密码
     * @return [boolean] []
     */
    public function login()
    {
        $this->ajaxReturn(false);
        exit;
        $data = file_get_contents('php://input', 'r');
        if ($username == null || $password == null) {
            $this->ajaxReturn(false);
        } else {
            $password = md5($password);
            $res = D('User')->login($username, $password);
            $this->ajaxReturn($res);
        }

    }
    /**
     * [校验用户名]
     * @return [boolean] [description]
     */
    public function checkUserName()
    {

        $data = file_get_contents('php://input');
        echo empty($data);

        if ($data) {
            $data = json_decode($data);
            $username = $data->username;
            $res = D('User')->checkUserName($username);
            $this->ajaxReturn($res);
        } else {
            $this->ajaxReturn(false);
        }
        // if ($username == null) {
        //     $this->ajaxReturn(false);
        // } else {
        //     $res = D('User')->checkUserName($username);
        //     $this->ajaxReturn($res);
        // }
    }

    public function userInfo()
    {
        echo 1;
    }
}
