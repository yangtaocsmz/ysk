<?php
namespace Api\Controller;

use Think\Controller;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Content-Type,X-Token');
class CardApiController extends Controller
{
    const OPENID = "B4A2019D7CA311E7BEA2001018640E28"; // 32位OpenId，大写
    const SECRET = "TYHPLT"; // 6位Secret，大写
    const USERACCOUNT = 10000;
    public $client = "";
    public function __construct()
    {
        return $this->client = new \Org\Util\OpenApiClient(self::OPENID, self::SECRET);
    }

    public function cardList()
    {

        // $where = "RegisterTime > '2018-01-31' and RegisterTime < '2018-02-01'";
        // $pageIndex = 0;
        // $pageSize = 20;
        $pageIndex = I('get.pageIndex');
        $pageSize = I('get.pageSize');
        $where = I('get.where');
        $orderBy = I('get.orderBy');

        $where = htmlspecialchars_decode($where);

        $data = array(
            "userAccount" => self::USERACCOUNT,
            "pageIndex" => $pageIndex,
            "pageSize" => $pageSize,
            "where" => $where,
            "orderBy" => $orderBy,
        );
        $response_data = $this->client->CallHttpPost("Get_MembersPagedV2", $data);
        $this->ajaxReturn($response_data);
    }
}
