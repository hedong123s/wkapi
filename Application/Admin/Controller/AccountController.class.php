<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
use Think\Upload;
class AccountController extends BaseController {
	public function __construct(){
		parent::__construct();
		$this->checklogin();
	}

	public function index(){
		$res = M('admin')->select();
		$this->assign("list",$res);
		$this->display();
	}

	public function delete(){
        $this->checklogin();
        $id = I('id');
        if(M("admin")->delete($id)){
            $this->success("删除成功");
        }
    }

    public function add(){
        $this->checklogin();
        if(I('id') != ''){
            $r = M('admin')->where(array('id'=>I('id')))->find();
            $this->assign("r",$r);
        }
        $this->display();
    }

    public function do_add(){
        $this->checklogin();
        
        $arr['username'] = I('username');
        $arr['team_id'] = I('team_id');
        $arr['password'] = I('password');
        $arr['nickname'] = I('nickname');
        $arr['addtime'] = time();
    
        if(I('id') != ''){
            //更新
            if(M('admin')->where(array('id'=>I('id')))->save($arr)){
                $this->success('编辑成功');
            }
        }else{
            //写入            
            if(M('admin')->add($arr)){
                $this->success('插入成功');
            }
        }
       
    }
}