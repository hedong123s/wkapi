<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
class IndexController extends Controller {
    public function login(){
		$this->display('login');
    }

    public function dologin(){
    	$name = I('name');
    	$password = I('password');
    	if($name != 'admin' && $password != '123123'){
    		$this->error('信息错误','./login');
    	}else{
    		session('admin','1');
    		$this->success('登录成功','./index');
    	}
    }

	public function index(){
		$this->display();
	}

	public function welcome(){
		echo 'welcome';
	}
	
}