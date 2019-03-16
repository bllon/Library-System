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
		body{
			width:100%;
			height:100%;
			overflow:hidden;
		}
		.app{
			width:100%;
			height:100%;
		}
		a{
			margin-left: 30px;
		}
		h4{
			margin-top:40px;
		}
	</style>
</head>
<body>
	<div class="app">
		<div class="container">
			<div class="row">
				<p class="text-info">
					学生用户:&nbsp;<strong class="text-primary"><?php echo ($student[0]['student_name']); ?></strong>
					<a href="javascript:history.back();" class="btn btn-success pull-right">上一步</a>
				</p>
				<h4 class="text-right text-primary">借阅操作</h4>
				<a class="btn btn-success" href="<?php echo U('admin/borrow/borrowBook');?>">借书</a>
				<a class="btn btn-info" href="<?php echo U('admin/borrow/returnBook');?>">还书</a>
				<a class="btn btn-danger" href="<?php echo U('admin/borrow/renewBook');?>">续借</a>
			</div>
		</div>
	</div>
	
</body>
</html>