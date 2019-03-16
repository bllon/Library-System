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
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="/TuShuGuan/test/Public/Admin/jquery-easyui-1.6.7/jquery.easyui.min.js"></script>
	<style>
		input{
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<div class="app">
		<div class="container">
			<div class="row">
				<h4 class="text-right text-primary">借阅记录</h4>
				<p class="text-info">书刊总数:<span class="text-danger">&nbsp;&nbsp;<?php echo ($bookNum); ?>本</span></p>
				<p class="text-info">借出总数:<span class="text-danger">&nbsp;&nbsp;<?php echo ($borrowNum); ?>本</span></p>
				<p class="text-info">借阅记录:<span class="text-danger">&nbsp;&nbsp;<?php echo ($historyNum); ?>条</span></p>
				<p class="text-info">学生总数:<span class="text-danger">&nbsp;&nbsp;<?php echo ($studentNum); ?>人</span></p>
				
			</div>
		</div>
	</div>
	
</body>
</html>