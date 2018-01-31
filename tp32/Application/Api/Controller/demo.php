<?php
/*
 * 会员营销系统开放平台 SKD V1.0.0
 * 此 SDK 适用于 PHP 5 及其以上版本。
 * 文本编码方式UTF-8
 * lib文件夹为SDK核心文件夹，包含了对OpenAPI接口的请求和数据的接收，OpenApiClient.php文件为核心文件
 * OpenApiData.xml文件为各接口的配置文件，这两个文件都不得缺失。
 * 本文件为示例代码，仅供参考，实际项目中可去除。
 *
 * LastupDate 2016-05-16
 */
header ( "Content-Type: text/html; charset=UTF-8" );
include ("lib/OpenApiClient.php");

// OpenId、Secret在平台获取
$OpenId = "018621CC415C4BABBCCC7899A21577F7"; // 32位OpenId，大写
$Secret = "FIQK0J"; // 6位Secret，大写
$client = new OpenApiClient ( $OpenId, $Secret );

/*
 * 示例一:查询会员信息接口DEMO,接口地址http://openapi.1card1.cn/OpenApiDoc/Get_MemberInfo
 */ 

// 1.先组装要发送的数据
$data = array (
		"cardId" => "q", // 卡号，或者手机号
		"password" => "", // 可为空,如果不为空，则验证密码
		"isGetExtValue" => "false",// 是否获取扩展字段（true/false,默认是false，不获取
); 
// 2.发起请求
$response_data = $client->CallHttpPost ( "Get_MemberInfo", $data );

// 3.显示结果,status=0表示接口请求成功,否则(一般为status=-1)表示接口请求错误,返回的message为失败的具体原因
if ($response_data ["status"] === 0) {
	$data = $response_data ["data"];
	// var_dump ( $data ); //您可以将$data打印出来方便调试
	// 返回的数据中可能会有多条结果,下方的的$data [0]表示读取返回的数据中第一个会员
	echo "会员信息查询成功" . "<br/>";
	echo "会员卡号:" . $data [0] ["CardId"] . "<br/>";
	echo "会员级别:" . $data [0] ["MemberGroupName"] . "<br/>";
	echo "会员姓名:" . $data [0] ["TrueName"] . "<br/>";
	echo "会员手机号:" . $data [0] ["Mobile"] . "<br/>";
	echo "剩余储值:" . $data [0] ["EnableValue"] . "<br/>";
} else {
	echo "会员信息查询失败，失败原因：" . $response_data ["message"] . "<br />";
}
?>