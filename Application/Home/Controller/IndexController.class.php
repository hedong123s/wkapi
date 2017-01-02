<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Think\Log;
class IndexController extends Controller {
    public function index(){
	    //2万以下   2万-3万   3万以上  不限价格 

		//单间  公寓   两房  三房  四房  五房  别墅  不限户型
		Log::write(1111111111,'mb');
		$map = I("map",'','');
		Log::write($map,'info');
		//$map = '{"area":["黄埔区"],"price":["1万--1.5万"],"huxin":["不限户型"]}';

		//2万以下   2万-3万   3万以上  不限价格 
		//单间  公寓   两房  三房  四房  五房  别墅  不限户型
		if($map != ''){
			$map = json_decode($map);
		}
		$arr = array(); 
		$newarea = array();
		foreach($map->area as $k=>$v){
			if($v == '不重要') {
				$arr['area'] = array('like',"%%");
				break;
			}else{
				$newarea[] = $v;	
				$arr['area'] = array('in',$newarea);
			}
		}
		
		foreach($map->price as $k=>$v){
			if($v == '不限价格') {
				//$arr['price_type'] = array('like',"%%");
				//break;
				$v=0;
			}else{
				if($v == '1万以下'){
					$v=1;
				}elseif($v == '1万--1.5万'){
					$v=2;
				}elseif($v == '1.5万--2万'){
					$v=3;
				}elseif($v == '2万--2.5万'){
					$v=4;
				}elseif($v == '2.5万--3万'){
					$v=5;
				}elseif($v == '3万--3.5万'){
					$v=6;
				}elseif($v == '3.5万--4万'){
					$v=7;
				}elseif($v == '4万以上'){
					$v=8;
				}
			}
			$newprice[] = $v;	
			$arr['price_type'] = array('in',$newprice);
		}
		foreach($map->huxin as $k=>$v){
			if($v == '不限户型') {
				$arr['huxin_type'] = array('like',"%%");
				break;
			}else{
				if($v == '单间'){
					$v='%单间%';
				}elseif($v == '公寓'){
					$v='%公寓%';
				}elseif($v == '两房'){
					$v='%两房%';
				}elseif($v == '三房'){
					$v='%三房%';
				}elseif($v == '四房'){
					$v='%四房%';
				}elseif($v == '五房'){
					$v='%五房%';
				}elseif($v == '别墅'){
					$v='%五房%';
				}
				$newhuxin[] = $v;	
				$arr['huxin_type'] = array('like',$newhuxin,'OR');
			}
		}
		$res = M("wk")->where($arr)->order('rand()')->select();
		
		if(count($res) == 3){
			foreach($res as $k=>$v){
				$res[$k]['type'] = 1;
			}
		}elseif(count($res) == 2){
			foreach($res as $k=>$v){
				$res[$k]['type'] = 1;
			}
			$arr['price_type'] = array('like',"%%");
			$arr['area'] = array('like',"%%");
			$r_tmp = M("wk")->order('rand()')->where($arr)->limit(1)->select();
			$res[2] = $r_tmp[0];
			$res[2]['type'] = 0;			
		}elseif(count($res) == 1){
			foreach($res as $k=>$v){
				$res[$k]['type'] = 1;
			}
			$arr['price_type'] = array('like',"%%");
			$arr['area'] = array('like',"%%");
			$r_tmp = M("wk")->order('rand()')->where($arr)->limit(2)->select();
			$res[1] = $r_tmp[0];
			$res[1]['type'] = 0;
			$res[2] = $r_tmp[1];
			$res[2]['type'] = 0;
		}elseif(count($res) == 0){
			$arr['price_type'] = array('like',"%%");
			$arr['area'] = array('like',"%%");
			$arr['huxin_type'] = array('like',"%%");
			$r_tmp = M("wk")->order('rand()')->where($arr)->limit(3)->select();
			$res[1] = $r_tmp[0];
			$res[1]['type'] = 0;
			$res[2] = $r_tmp[1];
			$res[2]['type'] = 0;
			$res[0] = $r_tmp[2];
			$res[0]['type'] = 0;
		}
		/*
		if(count($res) < 3){
			$arr['price_type'] = array('like',"%%");
			$res = M("wk")->order('rand()')->where($arr)->limit(3)->select();
			if(count($res) < 3){
				$arr['area'] = array('like',"%%");
				$res = M("wk")->order('rand()')->where($arr)->limit(3)->select();
				if(count($res) < 3){
					$arr['huxin_type'] = array('like',"%%");
					$res = M("wk")->order('rand()')->where($arr)->limit(3)->select();
				}
			}
		}*/
		if(!empty($res)){
			foreach($res as $k=>$v){
				$keywords = $v['keyword'];
				$arr = explode('、',$keywords);
				$res[$k]['keywords'] = $arr;
				$dizhi = $v['dizhi'];
				$arr1 = explode('（',$dizhi);
				if($arr1){
					$res[$k]['app_dizhi'] = $arr1[0];
				}else{
					$res[$k]['app_dizhi'] = $dizhi;
				}
				

			}
		}
		exit(json_encode(array('err'=>0,'msg'=>'查询成功','res'=>$res)));

    }

	public function detail(){
		$id = I('post.id');
		$map['id']  = $id;
		$res = M("wk")->where($map)->find();
		if(!empty($res)){
			
			$keywords = $res['keyword'];
			Log::write($keywords,'keywords');
			$arr = explode('、',$keywords);
			$res['keywords'] = $arr;
			$dizhi = $res['dizhi'];
			$arr1 = explode('(',$dizhi);
			$res['app_dizhi'] = $arr1[0];

		}
		exit(json_encode(array('err'=>0,'msg'=>'查询成功','res'=>$res)));
	}

	public function feedback(){
		$name = I('name');
		$mobile = I('tel');
		if(mb_strlen($name) > 12 || $name == ''){
			exit(json_encode(array('err'=>1,'msg'=>'请输入正确的姓名')));
		}
		if(!preg_match("/^1[34578]{1}\d{9}$/",$mobile)){
			exit(json_encode(array('err'=>2,'msg'=>'请输入正确的电话')));
		} 
		if(M('feedback')->where(array('mobile'=>$mobile))->find()){
			exit(json_encode(array('err'=>3,'msg'=>'您的手机号码已经记录')));
		}

		$data['name'] = $name;
		$data['mobile'] = $mobile;
		$data['addtime'] = time();
		$r = M("feedback")->add($data);
		if($r){
			exit(json_encode(array('err'=>0,'msg'=>'信息已录入','res'=>$r)));
		}
	}

	public function manager(){
		$res = M("wkmanager")->limit(3)->select();
		if($res){
			exit(json_encode(array('err'=>0,'msg'=>'查询成功','res'=>$res)));
		}
	}

	
}