<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/TuShuGuan/test/Public/Admin/bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/TuShuGuan/test/Public/Admin/css/login.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="text-center text-danger bg-info title">图书馆管理系统</h2>
			<div class="col-md-2">
				
			</div>
			<div class="col-md-8 col-xs-12 loginBox">
				<form action="<?php echo U('admin/User/reg');?>" method="post">
					<h4 class="text-center text-info">管理员注册</h4>
					<input type="text" name="username" id="username" value="" class="form-control" placeholder="输入用户名"/>
					<input type="tel" name="phone" id="phone" value="" class="form-control" placeholder="输入联系手机"/>
					<input type="password" name="password" id="pass" value="" class="form-control" placeholder="输入密码"/>
					<input type="password" name="repwd" id="confirm_password" value="" class="form-control" placeholder="确认密码"/>
					<button type="submit" class="btn btn-block btn-success">注册</button>
				</form>
			</div>
			<div class="col-md-2">
				
			</div>
		</div>
	</div>
</body>
</html>