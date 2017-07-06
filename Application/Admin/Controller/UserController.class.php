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
		if(session('team_id') != ''){
			$arr['appcode'] = session('team_id');
			$res = M('feedback')->where($arr)->order("id desc")->select();
		}else{
			$res = M('feedback')->order("id desc")->select();
		}		
		$this->assign("res",$res);
		$this->display();
	}

	/**
	 * 用户浏览
	 * @return [type] [description]
	 */
	public function logs(){
		if(session('team_id') != ''){
			$arr['appcode'] = session('team_id');
			$res = M('wklog')->where($arr)->order("time desc")->select();
		}else{
			$res = M('wklog')->order("time desc")->select();
		}
		$this->assign("res",$res);
		$this->display();
	}

	/**
	 * 导出
	 */
	public function export(){

		Vendor('PHPExcel.PHPExcel');
		$objExcel=new \PHPExcel();  //创建一个excel

		
		//设置导出内容
		$objExcel->getActiveSheet()->setCellValue('A1', 'ID'); 
		$objExcel->getActiveSheet()->setCellValue('B1', 'openid'); 
		$objExcel->getActiveSheet()->setCellValue('C1', '性别');
		$objExcel->getActiveSheet()->setCellValue('D1', '地区');
		$objExcel->getActiveSheet()->setCellValue('E1', '价格');
		$objExcel->getActiveSheet()->setCellValue('F1', '户型');
		$objExcel->getActiveSheet()->setCellValue('G1', '浏览');
		$objExcel->getActiveSheet()->setCellValue('H1','添加时间');

		if(session('team_id') != ''){
			$arr['appcode'] = session('team_id');
			$res = M('wklog')->where($arr)->order("time desc")->select();
		}else{
			$res = M('wklog')->order("time desc")->select();
		}
		
		$i=2;
		foreach($res as $val){
			$arr = explode('|', $val['select']);
			$objExcel->getActiveSheet()->setCellValue('A'.$i, $val['id']); 
			$objExcel->getActiveSheet()->setCellValue('B'.$i, $val['openid']); 
			$objExcel->getActiveSheet()->setCellValue('C'.$i, $val['gender'] == 1 ? '男':'女');
			$objExcel->getActiveSheet()->setCellValue('D'.$i, $arr[0]);
			$objExcel->getActiveSheet()->setCellValue('E'.$i, $arr[1]);
			$objExcel->getActiveSheet()->setCellValue('F'.$i, $arr[2]);
			$objExcel->getActiveSheet()->setCellValue('G'.$i, $val['info']);
			$objExcel->getActiveSheet()->setCellValue('H'.$i, date("Y-m-d H:i:s",$val['time']));
			$i++;
		}
		
		//设置导出文件名
		$outputFileName = "浏览日志".date("Y-m-d").'.xls'; 
		$xlsWriter = new \PHPExcel_Writer_Excel5($objExcel); 
		header("Content-Type: application/force-download"); 
		header("Content-Type: application/octet-stream"); 
		header("Content-Type: application/download"); 
		header('Content-Disposition:inline;filename="'.$outputFileName.'"'); 
		header("Content-Transfer-Encoding: binary"); 
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Pragma: no-cache"); 
		$xlsWriter->save( "php://output" );
	}

	/**
	 * 导出留言
	 */
	public function exportlog(){

		Vendor('PHPExcel.PHPExcel');
		$objExcel=new \PHPExcel();  //创建一个excel

		
		//设置导出内容
		$objExcel->getActiveSheet()->setCellValue('A1', 'ID'); 
		$objExcel->getActiveSheet()->setCellValue('B1', '姓名'); 
		$objExcel->getActiveSheet()->setCellValue('C1', '电话');
		$objExcel->getActiveSheet()->setCellValue('D1', '来源');
		$objExcel->getActiveSheet()->setCellValue('E1', '渠道');
		$objExcel->getActiveSheet()->setCellValue('F1', '地区');
		$objExcel->getActiveSheet()->setCellValue('G1', '价格');
		$objExcel->getActiveSheet()->setCellValue('H1', '户型');
		$objExcel->getActiveSheet()->setCellValue('I1','添加时间');

		if(session('team_id') != ''){
			$arr['appcode'] = session('team_id');
			$res = M('feedback')->where($arr)->order("id desc")->select();
		}else{
			$res = M('feedback')->order("id desc")->select();
		}	
		
		$i=2;
		foreach($res as $val){
			if($val['remark'] == 'undefined') $arr = '||不限户型';
			if($val['appcode'] == '1') $appcode = '曹广标组';
			if($val['appcode'] == '2') $appcode = '卢向曦组';
			if($val['appcode'] == '3') $appcode = '张雅静组';
			if($val['appcode'] == '4') $appcode = '网拓组';	
			if($val['appcode'] == '1') $qudao   = '渠道一';
			if($val['appcode'] == '2') $qudao   = '渠道二';
			if($val['appcode'] == '3') $qudao   = '渠道三';
			if($val['appcode'] == '4') $qudao   = '渠道四';
			if($val['appcode'] == '5') $qudao   = '渠道五';
			$arr = explode('|', $val['remark']);
			$objExcel->getActiveSheet()->setCellValue('A'.$i, $val['id']); 
			$objExcel->getActiveSheet()->setCellValue('B'.$i, $val['name']); 
			$objExcel->getActiveSheet()->setCellValue('C'.$i, $val['mobile']);
			$objExcel->getActiveSheet()->setCellValue('D'.$i, $appcode);
			$objExcel->getActiveSheet()->setCellValue('E'.$i, $qudao);
			$objExcel->getActiveSheet()->setCellValue('F'.$i, empty($arr[0]) ? '不重要' : $arr[0]);
			$objExcel->getActiveSheet()->setCellValue('G'.$i, empty($arr[1]) ? '不限价格' : $arr[1]);
			$objExcel->getActiveSheet()->setCellValue('H'.$i, empty($arr[2]) ? '不限户型' : $arr[2]);			
			$objExcel->getActiveSheet()->setCellValue('I'.$i, date("Y-m-d H:i:s",$val['addtime']));
			$i++;
		}
		
		//设置导出文件名
		$outputFileName = "留言信息".date("Y-m-d").'.xls'; 
		$xlsWriter = new \PHPExcel_Writer_Excel5($objExcel); 
		header("Content-Type: application/force-download"); 
		header("Content-Type: application/octet-stream"); 
		header("Content-Type: application/download"); 
		header('Content-Disposition:inline;filename="'.$outputFileName.'"'); 
		header("Content-Transfer-Encoding: binary"); 
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Pragma: no-cache"); 
		$xlsWriter->save( "php://output" );
	}
	
}