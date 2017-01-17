<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Think\Log;
use Common\Service\Curl;
class CreatecodeController extends Controller {
    public function index(){
    	$access_token = 'kRIpA-lyzV9yJtpKouWDmK3_BY4qnJmNx21E4YUYCtuHBdd5OxYOx3kpB6l2a_ihg05uNqVg8f0MGDX6gJN4iygbs8mUZWO1Lxw9tu2OqQVBXB0uktpN6DyFRD22B2uCFCYhADAAXT';
    	$url = "https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode?access_token=".$access_token;
    	$data['path'] = 'pages/zhaofang1/zhaofang1?no=6';
    	$data['width'] = '430'; 
    	$res = Curl::request('POST', $url, $data);
    	var_dump($res);
    }
}