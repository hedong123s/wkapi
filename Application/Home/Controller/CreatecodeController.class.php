<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Think\Log;
use Common\Service\Curl;
class CreatecodeController extends Controller {
    public function index(){
    	$access_token = 'ovsS6xZP4LBr-E062faWoi7uj5z6-QqyDT4p5rfNna_VELLeJveFfHOwV-2w9-ccsd5kDzs3lPzUkw2tIob6_A8zB3LIpuI1nIzBCvhQv1w1_irpp-q-wmkNCBGxa9cjTFRaAEAEQC';
    	$url = "https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode?access_token=".$access_token;
    	$data['path'] = I("path");
    	$data['width'] = i("width"); 
    	$res = Curl::request('POST', $url, $data);
    	var_dump($res);
    	exit(json_encode(array('err'=>0,'msg'=>$res)));
    }
}