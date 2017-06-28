<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
class IndexController extends BaseController {
    public function login(){
		$this->display('login');
    }

    public function dologin(){
    	$name = I('name');
    	$password = I('password');

    	if($name !== 'admin' || $password !== '123123'){
    		$this->error('信息错误','index.php?m=admin&c=index&a=login');
    	}else{
    		session('admin','1');
    		$this->success('登录成功','index.php?m=admin&c=index&a=index');
    	}
    }

    public function logout(){
        session('admin','0');
        $this->success('已退出登录','index.php?m=admin&c=index&a=login');
    }

	public function index(){
        $this->checklogin();
		$this->display();
	}

	public function welcome(){
        $this->checklogin();
		echo 'welcome';
	}

    public function manager(){
        $this->checklogin();
        $r = M('wkmanager')->select();
        $this->assign("list",$r);
        $this->display();
    }

    public function delete(){
        $this->checklogin();
        $id = I('id');
        if(M("wkmanager")->delete($id)){
            $this->success("删除成功");
        }
    }

    public function addman(){
        $this->checklogin();
        if(I('id') != ''){
            $r = M('wkmanager')->where(array('id'=>I('id')))->find();
            $this->assign("r",$r);
        }
        $this->display();
    }

    public function do_add(){
        $this->checklogin();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     __ROOT__.'/uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();
        if($info['pic']){
            $arr['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
        }
        $arr['name'] = I('name');
        $arr['team_id'] = I('team_id');
        $arr['zhiwei'] = I('zhiwei');
        $arr['mobile'] = I('mobile');
        $arr['wechat'] = I('wechat');
        $arr['describe'] = I('describe');
    
        if(I('id') != ''){
            //更新
            if(M('wkmanager')->where(array('id'=>I('id')))->save($arr)){
                $this->success('编辑成功');
            }
        }else{
            //写入            
            if(M('wkmanager')->add($arr)){
                $this->success('插入成功');
            }
        }
       
    }
	
}