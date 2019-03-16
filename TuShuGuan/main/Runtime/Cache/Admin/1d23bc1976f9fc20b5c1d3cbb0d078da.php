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
	<script type="text/javascript" src="/TuShuGuan/test/Public/Admin/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/TuShuGuan/test/Public/Admin/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/TuShuGuan/test/Public/Admin/jquery-easyui-1.6.7/jquery.easyui.min.js"></script>
	<style>
		select{
			margin-bottom: 20px;
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
				<h4 class="text-right text-primary">显示书刊</h4>
				<table class="table table-bordered table-hover" border="" cellspacing="" cellpadding="">
					<caption>书刊信息</caption>
					<tr>
						<th>ID</th>
						<th>书名</th>
						<th>作者</th>
						<th>数量</th>
						<th>借出</th>
						<th>上架时间</th>
						<th>操作</th>
					</tr>
					<tr>
						<td class="text-info"><?php echo ($book[0]['book_id']); ?></td>
						<td><?php echo ($book[0]['book_name']); ?></td>
						<td><?php echo ($book[0]['book_writer']); ?></td>
						<td><?php echo ($book[0]['num']); ?></td>
						<td class="text-danger"><?php echo ($book[0]['borrow_num']); ?></td>
						<td><?php echo ($book[0]['addtime']); ?></td>
						<td><a href="" class="btn btn-info" data-toggle="modal" data-target="#myModal">借阅</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade box" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
		     	<div class="modal-body">
			      	<h3>借书天数</h3>
			      	<p class="text-info">学生用户:&nbsp;<strong class="text-primary"><?php echo ($student[0]['student_name']); ?></strong></p>
			        <form action="<?php echo U('Admin/borrow/borrowUpdate');?>" method="post">
			        	<select name="time" class="form-control">
			        		<option value="30" selected="selected">1个月</option>
			        		<option value="60">2个月</option>
			        		<option value="90">3个月</option>
			        		<option value="120">4个月</option>
			        	</select>
			        	<input type="hidden" name="student_id" id="student_id" value="<?php echo ($student[0]['student_number']); ?>" />
			        	<input type="hidden" name="index" id="index" value="<?php echo ($book[0]['book_id']); ?>" />
			        	<button type="submit" class="btn btn-success">确定</button>
			        </form>
		    	</div>
		    </div>
		</div>
	</div>
</body>
</html>