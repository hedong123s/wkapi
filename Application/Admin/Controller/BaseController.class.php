<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function checklogin(){
		if(session('admin') == '' ){
			$this->error('请登录','index.php?m=admin&c=index&a=login');
		}
	}
}