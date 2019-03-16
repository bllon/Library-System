<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="/TuShuGuan/test/Public/Admin/jquery-easyui-1.6.7/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/TuShuGuan/test/Public/Admin/jquery-easyui-1.6.7/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/TuShuGuan/test/Public/Admin/bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/TuShuGuan/test/Public/Admin/css/index.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="/TuShuGuan/test/Public/Admin/jquery-easyui-1.6.7/jquery.easyui.min.js"></script>
</head>
<body>
	<div class="app">
		<div class="container">
			<div class="row">
				<h2 class="text-center text-info bg-info">图书馆管理系统</h2>
			</div>
			<div class="row">
				<div class="col-md-10">
					<div style="padding:5px;width:500px;float:left;">
				        <a href="javascript:window.opener = null;window.open('<?php echo U('admin/User/login');?>','_self');window.close();" class="easyui-linkbutton" iconCls="icon-cancel">退出系统</a>
				        <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-reload" onclick="exit();">重新登录</a>
				        <a href="#" class="easyui-linkbutton" iconCls="icon-search">搜索</a>
				        <a href="javascript:void(0);" class="easyui-linkbutton" onclick="upadtePass();">修改密码</a>
				        <a href="javascript:window.print();" class="easyui-linkbutton" iconCls="icon-print">打印</a>
				    </div>
				    
				</div>
				<div class="col-md-2 user">
					欢迎,<span><?php echo (cookie('username')); ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 menu">
					<div style="width:195px;height:auto;background:#7190E0;padding:5px;">
						<div class="easyui-panel" title="书刊管理" collapsible="true" style="width:185px;height:auto;">
							<ul>
								<li><a href="javascript:void(0);" onclick="book();">书刊信息设置</a></li>
								<li><a href="javascript:void(0);" onclick="addBook();">上架新书</a></li>
							</ul>
						</div>
						<div class="easyui-panel" title="读者管理" collapsible="true" style="width:185px;height:auto;">
							<ul>
								<li><a href="javascript:void(0);" onclick="apply()">申请借阅证</a></li>
								<li><a href="javascript:void(0);" onclick="searchStudent();">读者信息维护</a></li>
								<li><a href="javascript:void(0);" onclick="zhidu();">借阅规章制度</a></li>
							</ul>
						</div>
						<div class="easyui-panel" title="借阅管理" collapsible="true" style="width:185px;height:auto;">
							<ul>
								<li><a href="javascript:void(0);" onclick="borrowAction();">借书还书续借</a></li>
								<li><a href="javascript:void(0);" onclick="borrowItem();">借阅记录查询</a></li>
							</ul>
						</div>
						<div class="easyui-panel" title="查询统计" collapsible="true" style="width:185px;height:auto;">
							<ul>
								<li><a href="javascript:void(0);" onclick="exceedItem();">逾期记录查询</a></li>
								<li><a href="javascript:void(0);" onclick="jilu();">借阅记录统计</a></li>
							</ul>
						</div>
						<div class="easyui-panel" title="系统维护" collapsible="true" collapsed="true" style="width:185px;height:auto;">
							<ul>
								<li><a href="javascript:void(0);">数据字典维护</a></li>
								<li><a href="javascript:void(0);">用户授权设置</a></li>
								<li><a href="javascript:void(0);">操作日志管理</a></li>
								<li><a href="javascript:void(0);">系统参数设置</a></li>
								<li><a href="javascript:void(0);">高级管理工具</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-10">
					<div class="row content">
						<iframe id='frame' src="<?php echo U('admin/index/lv');?>" width="100%" height="100%"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
<script type="text/javascript">
	function book(){
		document.getElementById('frame').src="<?php echo U('admin/book/book');?>";
	}
	
	function searchStudent(){
		document.getElementById('frame').src="<?php echo U('admin/student/searchStudent');?>";
	}
	function addBook(){
		document.getElementById('frame').src="<?php echo U('admin/book/addBook');?>";
	}
	function zhidu(){
		document.getElementById('frame').src="<?php echo U('admin/book/zhidu');?>";
	}
	function apply(){
		document.getElementById('frame').src="<?php echo U('admin/student/apply');?>";
	}
	function borrowAction(){
		document.getElementById('frame').src="<?php echo U('admin/borrow/borrowAction');?>";
	}
	function upadtePass(){
		document.getElementById('frame').src="<?php echo U('admin/user/update');?>";
	}
	function exit(){
		location.href="<?php echo U('admin/user/logout');?>";
	}
	
	function reg(){
		location.href="<?php echo U('admin/user/reg');?>";
	}
	function borrowItem(){
		document.getElementById('frame').src="<?php echo U('admin/borrow/borrowItem');?>";
	}
	function exceedItem(){
		document.getElementById('frame').src="<?php echo U('admin/borrow/borrowExceed');?>";
	}
	function jilu(){
		document.getElementById('frame').src="<?php echo U('admin/borrow/jilu');?>";
	}
</script>
</html>