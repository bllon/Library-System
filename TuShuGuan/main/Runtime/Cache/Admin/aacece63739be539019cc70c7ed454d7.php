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
			margin-bottom:10px;
		}
	</style>
</head>
<body>
	<div class="app">
		<div class="container">
			<div class="row">
				<h4 class="text-right text-primary">上架新书</h4>
				<form action="<?php echo U('admin/book/addBook');?>" method="post">
					<label for="book_name">书名</label>
					<input type="text" name="book_name" id="book_name" value="" class="form-control" placeholder="输入书名"/>
					<label for="writer">作者</label>
					<input type="text" name="writer" id="writer" value=""  class="form-control" placeholder="输入作者"/>
					<label for="number">数量</label>
					<input type="number" name="number" id="number" value=""  class="form-control" placeholder="输入数量"/>
					<label for="time">上架时间</label>
					<input type="date" name="time" id="time" value=""  class="form-control" />
					<button type="submit" class="btn btn-info">提交</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>