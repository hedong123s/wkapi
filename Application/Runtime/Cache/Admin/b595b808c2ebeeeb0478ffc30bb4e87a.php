<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/wkapi/Public/admin/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/wkapi/Public/admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/wkapi/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/wkapi/Public/admin/lib/iconfont/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/wkapi/Public/admin/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="lib/font-awesome/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>WANKE v1.0</title>
<meta name="keywords" content="H-ui.admin v2.2,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v2.2，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<header class="Hui-header cl"> <a class="Hui-logo l" title="H-ui.admin v2.2" href="/">H-ui.admin</a> <a class="Hui-logo-m l" href="/" title="H-ui.admin">H-ui</a> <span class="Hui-subtitle l">V2.2</span> <span class="Hui-userbox"><span class="c-white">超级管理员：admin</span> <a class="btn btn-danger radius ml-10" href="#" title="退出"><i class="icon-off"></i> 退出</a></span> <a aria-hidden="false" class="Hui-nav-toggle" href="#"></a> </header>
<aside class="Hui-aside">
  <input runat="server" id="divScrollValue" type="hidden" value="" />
  <div class="menu_dropdown bk_2">
    <dl id="menu-user">
      <dt><i class="icon-user"></i> 用户中心<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a href="index.php?m=admin&c=user&a=logs" href="javascript:;" target="_blank">用户日志</a></li>
        </ul>
      </dd>
    </dl>


    <dl id="menu-system">
      <dt><i class="icon-cogs"></i> 房屋管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a href="index.php?m=admin&c=house&a=index" href="javascript:void(0)"  target="_blank">房屋列表</a></li>
        </ul>
      </dd>
    </dl>
  </div>
</aside>
<div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
  <div id="Hui-tabNav" class="Hui-tabNav">
    <div class="Hui-tabNav-wp">
      <ul id="min_title_list" class="acrossTab cl">
        <li class="active"><span title="我的桌面" data-href="index.php?m=admin&c=welcome&a=index">我的桌面</span><em></em></li>
      </ul>
    </div>
    <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="icon-step-backward"></i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="icon-step-forward"></i></a></div>
  </div>
  <div id="iframe_box" class="Hui-article">
    <div class="show_iframe">
      <div style="display:none" class="loading"></div>
      <iframe scrolling="yes" frameborder="0" src="index.php?m=admin&c=welcome&a=index"></iframe>
    </div>
  </div>
</section>
<script type="text/javascript" src="/wkapi/Public/admin/lib/jquery.min.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/Validform_v5.3.2.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/lib/layer1.8/layer.min.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/wkapi/Public/admin/js/H-ui.admin.doc.js"></script> 
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