<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
class UserController extends BaseController {
	public function __construct(){
		parent::__construct();
		$this->checklogin();
	}
	
	public function index(){
		echo '用户中心';
		//$this->display();
	}

	/**
	 * 用户留言
	 * @return [type] [description]
	 */
	public function feedback(){
		$res = M('feedback')->order("id desc")->select();
		$this->assign("res",$res);
		$this->display();
	}

	/**
	 * 用户浏览
	 * @return [type] [description]
	 */
	public function logs(){
		$res = M('wklog')->order("id desc")->select();
		$this->assign("res",$res);
		$this->display();
	}
	
}