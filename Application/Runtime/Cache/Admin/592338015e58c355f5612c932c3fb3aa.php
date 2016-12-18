<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/wkapi/Public/admin/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/wkapi/Public/admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/wkapi/Public/admin/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="lib/font-awesome/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link href="/wkapi/Public/admin/lib/iconfont/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>房屋管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 房屋管理 <span class="c-gray en">&gt;</span> 房屋列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">
<!--
  <div class="text-c"> 日期范围：
    <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D('datemax')||'%y-%M-%d'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
    -
    <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D('datemin')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
    <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name=""><button type="submit" class="btn btn-success" id="" name=""><i class="icon-search"></i> 搜用户</button>
  </div>
-->
  <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
  <!--<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>  -->
  <a href="javascript:;" onclick="user_add('550','','添加用户','index.php?m=admin&c=house&a=add')" class="btn btn-primary radius"><i class="icon-plus"></i> 添加房源</a></span> <span class="r">共有数据：<strong><?php echo count($res); ?></strong> 条</span> </div>
  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
      <tr class="text-c">
        <th width="2%">ID</th>
        <th width="5%">名称</th>
        <th width="5%">地区</th>
        <th width="5%">价格</th>
        <th width="5%">房屋类型</th>
        <th width="5%">销售状态</th>
        <th width="10%">关键字</th>
		    <th width="5%">户型</th>
        <th width="5%">面积</th>
        <th width="10%">地址</th>
        <th width="5%">价格区间</th>
        <th width="5%">户型类型</th>
        <th width="5%">图片</th>
        <th width="5%">操作</th>
      </tr>
    </thead>
    <tbody>
		<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><tr class="text-c">
			<td><?php echo ($r["id"]); ?></td>
			<td><?php echo ($r["title"]); ?></td>
			<td><?php echo ($r["area"]); ?></td>
			<td><?php echo ($r["price"]); ?></td>
			<td><?php echo ($r["wuye_type"]); ?></td>
			<td><?php echo ($r["sale_status"]); ?></td>
			<td><?php echo ($r["keyword"]); ?></td>
			<td><?php echo ($r["huxin"]); ?></td>
			<td><?php echo ($r["mianji"]); ?></td>
			<td><?php echo ($r["dizhi"]); ?></td>
			<td>
        <?php if($r['price_type'] == '0'): ?>待定<?php endif; ?>
        <?php if($r['price_type'] == '1'): ?>2万以下<?php endif; ?>
        <?php if($r['price_type'] == '2'): ?>2万-3万<?php endif; ?>
        <?php if($r['price_type'] == '3'): ?>3万以上<?php endif; ?>
      </td>
      <?php
 $rs = M('wkdetail')->where(array('rid'=>$r['id']))->find(); ?>
			<td><?php echo ($r["huxin_type"]); ?></td>
      <td>
          <a href="/wkapi/Public/../uploads/<?php echo ($rs["img1"]); ?>" target="_blank"><img src = '/wkapi/Public/../uploads/<?php echo ($rs["img1"]); ?>' style="width=50px;height:50px;"/></a>
          <a href="/wkapi/Public/../uploads/<?php echo ($rs["img2"]); ?>" target="_blank"><img src = '/wkapi/Public/../uploads/<?php echo ($rs["img2"]); ?>' style="width=50px;height:50px;"/></a>
          <a href="/wkapi/Public/../uploads/<?php echo ($rs["img3"]); ?>" target="_blank"><img src = '/wkapi/Public/../uploads/<?php echo ($rs["img3"]); ?>' style="width=50px;height:50px;"/></a>
          <a href="/wkapi/Public/../uploads/<?php echo ($rs["img4"]); ?>" target="_blank"><img src = '/wkapi/Public/../uploads/<?php echo ($rs["img4"]); ?>' style="width=50px;height:50px;"/></a>
      </td>
			<td class="f-14 user-manage">
			<a title="编辑" href="index.php?m=admin&c=house&a=edit&id=<?php echo ($r["id"]); ?>" onclick="user_edit('4','600','','编辑','index.php?m=admin&c=house&a=edit&id=<?php echo ($r["id"]); ?>')" class="ml-5" style="text-decoration:none" target="_top"><i class="icon-edit"></i></a>
			<a title="删除" href="javascript:;" onclick="user_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a></td>
		  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
  
</div>
<script type="text/javascript" src="/wkapi/Public/admin/lib/jquery.min.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/layer1.8/layer.min.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/laypage/laypage.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.js"></script>  
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.admin.doc.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"lengthMenu":false,//显示数量选择 
	"bFilter": false,//过滤功能
	"bPaginate": false,//翻页信息
	"bInfo": false,//数量信息
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
	]
});
</script> 
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>