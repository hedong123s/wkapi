<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
use Think\Upload;
class QudaoController extends BaseController {
	public function __construct(){
		parent::__construct();
		$this->checklogin();
	}

	public function index(){
		$r = M('qudao')->order('id desc')->select();
        $this->assign("list",$r);
        $this->display();
	}

	public function add(){
        $this->checklogin();
        if(I('id') != ''){
            $r = M('qudao')->where(array('id'=>I('id')))->find();
            $this->assign("r",$r);
        }
        $this->display();
    }

	public function do_add(){
        $this->checklogin();
      	$arr['name'] = I('name');
        $arr['content'] = I('content');
        if(I('id') != ''){
            //更新
            if(M('qudao')->where(array('id'=>I('id')))->save($arr)){
                $this->success('编辑成功');
            }
        }else{
            //写入            
            if(M('qudao')->add($arr)){
                $this->success('插入成功');
            }
        }
       
    }


}