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
		input{
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
				<h4 class="text-right text-primary">续借书刊</h4>
				<table class="table table-bordered table-hover" border="" cellspacing="" cellpadding="">
					<caption>借阅详情</caption>
					<tr>
						<th>ID</th>
						<th>书名</th>
						<th>借阅时间</th>
						<th>归还时间</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
					<?php if($borrow): if(is_array($borrow)): foreach($borrow as $k=>$bow): ?><tr class="text-center">
								<td class="text-info"><?php echo ($k+1); ?></td>
								<td><?php echo ($bow["borrowbook"]); ?></td>
								<td><?php echo ($bow["formtime"]); ?></td>
								<td><?php echo ($bow["totime"]); ?></td>
								<td class="text-danger">快到期</td>
								<td><a href="" class="btn btn-success rebtn" data-toggle="modal" data-target="#myModal">续借</a></td>
							</tr><?php endforeach; endif; ?>
					<?php else: ?>
						<tr>
							<td class="text-center" colspan="6">
								<strong class="text-danger">无借书情况</strong>
							</td>
						</tr><?php endif; ?>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade box" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-title">
			      	<h5 class="text-info text-center">学生用户:&nbsp;<strong class="text-primary"><?php echo ($student[0]['student_name']); ?></strong></h5>
		    	</div>
		    	<form action="<?php echo U('Admin/borrow/renewBook');?>" method="post">
			     	<div class="modal-body">
				       <h4>是否续借这本书?&nbsp;《<span id="bookname" class="text-danger"></span>》</h4>
				       <label for="time">续借周期:</label>
				       <select name="time" class="form-control">
			        		<option value="30" selected="selected">1个月</option>
			        		<option value="60">2个月</option>
			        		<option value="90">3个月</option>
			        		<option value="120">4个月</option>
			        	</select>
				       <input type="hidden" name="student_id" id="student_id" value="<?php echo ($student[0]['student_number']); ?>" />
				       <input type="hidden" name="book_name" id="book_name" value="" />
			    	</div>
			    	<div class="modal-footer">
			    		<button type="submit" class="btn btn-success">确定</button>
				        <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
			    	</div>
		    	</form>
		    </div>
		</div>
	</div>
</body>
<script>
	$('.rebtn').click(function(){
		var bookname=$(this).parents('tr').find('td').eq(1).html();
		$('#bookname').html(bookname);
		$('#book_name').val(bookname);
	});
</script>
</html>