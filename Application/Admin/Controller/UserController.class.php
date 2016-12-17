<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
class UserController extends Controller {
	public function index(){
		echo '用户中心';
		//$this->display();
	}

	public function logs(){
		$res = M('feedback')->select();
		$this->assign("res",$res);
		$this->display();
	}
	
}