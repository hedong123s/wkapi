<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
class WelcomeController extends BaseController {
	public function __construct(){
		parent::__construct();
		$this->checklogin();
	}

	public function index(){
		echo 'welcome';
		exit();
		$this->display();
	}

	
}