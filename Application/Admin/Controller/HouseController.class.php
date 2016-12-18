<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Log;
use Think\Upload;
class HouseController extends Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo __ROOT__;
		$r = M("wk")->order("id desc")->select();
		//var_dump($r);
		$this->assign("res",$r);
		$this->display();
	}

	public function edit(){
		$map['id'] = I('id');
		$res = M("wk")->where($map)->find();
		$this->assign("r",$res);
		$this->display();
	}

	public function add(){
		$this->display();
	}

	public function do_add(){
		if(I('act' == 'edit')){
			$data['id'] = I('id');
			$data['title'] = I('title');
			$data['area'] = I('area');
			$data['price'] = I('price');
			$data['price_type'] = I('price_type');
			$data['keyword'] = I('keyword');
			$data['huxin'] = I('huxin');
			$data['huxin_type']= I('huxin_type');
			$data['mianji'] = I('mianji');
			$data['sale_status'] = I('sale_status');
			$data['dizhi'] = I('dizhi');
			$r = M('wk')->save($data);

			$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->rootPath  =     __ROOT__.'/uploads/'; // 设置附件上传根目录
		    $upload->savePath  =     ''; // 设置附件上传（子）目录
		    // 上传文件 
		    $info   =   $upload->upload();
		    var_dump($info);
		    //exit();

	    	if($info['file-1']){
	    		$arr['img1'] = $info['file-1']['savepath'].$info['file-1']['savename'];
	    	}
	    	if($info['file-2']){
	    		$arr['img2'] = $info['file-2']['savepath'].$info['file-2']['savename'];
	    	}
	    	if($info['file-3']){
	    		$arr['img3'] = $info['file-3']['savepath'].$info['file-3']['savename'];
	    	}
	    	if($info['file-4']){
	    		$arr['img4'] = $info['file-4']['savepath'].$info['file-4']['savename'];
	    	}

    		$re = M("wkdetail")->where(array('rid'=>$data['id']))->save($arr);
    		if($re){
    			$this->success('更新成功');
    		}else{
    			var_dump($re);
    		}

		}
		
	}
	
}