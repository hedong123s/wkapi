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
<link href="/wkapi/Public/admin/lib/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="/wkapi/Public/admin/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="lib/font-awesome/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link href="/wkapi/Public/admin/lib/iconfont/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加房源</title>
</head>
<body>
<div class="pd-20">
  <form action="" method="post" class="form form-horizontal" id="form-user-add">
    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>名称：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php echo ($r["title"]); ?>" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="用户名不能为空">
      </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3">地区：</label>
      <div class="formControls col-5"> <span class="select-box">
        <select class="select" size="1" name="demo1" datatype="*" nullmsg="请选择所在地区！">
          <option value="" selected>请选择地区</option>
          <option value="黄埔区">黄埔区</option>
          <option value="南沙区">南沙区</option>
          <option value="荔湾区">荔湾区</option>
        </select>
        </span> </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>价格：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php echo ($r["price"]); ?>" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="价格不能为空">
      </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>价格区间</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="用户名不能为空">
      </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>关键字：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php echo ($r["keyword"]); ?>" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="关键字不能为空">
      </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>户型：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php echo ($r["huxin"]); ?>" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="户型不能为空">
      </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>户型类型：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="户型类型不能为空">
      </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>面积：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php echo ($r["mianji"]); ?>" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="面积不能为空">
      </div>
      <div class="col-4"> </div>
    </div>

    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>销售状态：</label>
      <div class="formControls col-5 skin-minimal">
        <div class="radio-box">
          <input type="radio" id="sex-1" name="sex" datatype="*" nullmsg="请选择性别！">
          <label for="sex-1">在售</label>
        </div>
        <div class="radio-box">
          <input type="radio" id="sex-2" name="sex">
          <label for="sex-2">待售</label>
        </div>
        <div class="radio-box">
          <input type="radio" id="sex-3" name="sex">
          <label for="sex-3">尾盘</label>
        </div>
      </div>
      <div class="col-4"> </div>
    </div>
    
    <div class="row cl">
      <label class="form-label col-3">附件：</label>
      <div class="formControls col-5"> <span class="btn-upload form-group">
        <input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly  datatype="*" nullmsg="请添加附件！" style="width:200px">
        <a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="iconfont">&#xf0020;</i> 浏览文件</a>
        <input type="file" multiple name="file-2" class="input-file">
        </span> </div>
      <div class="col-4"> </div>
    </div>

	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>地址：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php echo ($r["dizhi"]); ?>" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="地址不能为空">
      </div>
      <div class="col-4"> </div>
    </div>
    
	<!--
    <div class="row cl">
      <label class="form-label col-3">备注：</label>
      <div class="formControls col-5">
        <textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,100)"></textarea>
        <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
      </div>
      <div class="col-4"> </div>
    </div>
	-->
    <div class="row cl">
      <div class="col-9 col-offset-3">
        <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
      </div>
    </div>
  </form>
</div>
</div>
<script type="text/javascript" src="/wkapi/Public/admin/lib/jquery.min.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/Validform_v5.3.2.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$("#form-user-add").Validform({
		tiptype:2,
	});
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
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