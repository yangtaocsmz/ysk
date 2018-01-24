<?php
// 本类由系统自动生成，仅供测试用途
namespace Api\Controller;

use Think\Controller;

header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Origin:*'); //

class UserController extends Controller
{
    /**
     * 验证用户名密码
     * @return [boolean] []
     */
    public function login()
    {

        $username = I('post.username');
        $password = I('post.password');
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
        $username = I('post.username');
        if ($username !== null) {
            $res = D('User')->checkUserName($username);
            $this->ajaxReturn($res);
        }
    }
}
