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
				<h4 class="text-right text-primary">读者信息</h4>
				<?php if(is_array($student)): foreach($student as $key=>$student): ?><p>学号:&nbsp;<span class="text-info" contenteditable="true"><?php echo ($student["student_number"]); ?></span></p>
					<p>姓名:&nbsp;<span class="text-info" contenteditable="true"><?php echo ($student["student_name"]); ?></span></p>
					<p>性别:&nbsp;<span class="text-info" contenteditable="true"><?php echo ($student["sex"]); ?></span></p>
					<p>系别:&nbsp;<span class="text-info" contenteditable="true"><?php echo ($student["sdept"]); ?></span></p>
					<p>班级:&nbsp;<span class="text-info" contenteditable="true"><?php echo ($student["class"]); ?></span></p>
					<p>借书数量:&nbsp;<span class="text-info" contenteditable="true"><?php echo ($student["borrownumber"]); ?></span><small class="pull-right text-danger">每个用户最多借8本书</small></p><?php endforeach; endif; ?>
				<small class="text-danger">备注：（点击可进行编辑修改）</small>
			</div>
		</div>
	</div>
	
</body>
</html>