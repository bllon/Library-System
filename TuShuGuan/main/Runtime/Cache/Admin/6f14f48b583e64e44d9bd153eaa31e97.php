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
				<h4 class="text-right text-primary">借书记录</h4>
				<table class="table table-bordered table-hover" border="" cellspacing="" cellpadding="">
					<caption>记录详情</caption>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">书名</th>
						<th class="text-center">借阅时间</th>
						<th class="text-center">操作</th>
					</tr>
					<?php if($history): if(is_array($history)): foreach($history as $i=>$bow): ?><tr class="text-center">
								<td class="text-info"><?php echo ($i+1); ?></td>
								<td><?php echo ($bow["borrowbook"]); ?></td>
								<td><?php echo ($bow["formtime"]); ?></td>
								<td class="text-danger"><?php echo ($bow["action"]); ?></td>
							</tr><?php endforeach; endif; ?>
					<?php else: ?>
						<tr>
							<td class="text-center" colspan="6">
								<strong class="text-danger">无历史记录</strong>
							</td>
						</tr><?php endif; ?>
				</table>
				<nav aria-label="Page navigation">
				  <ul class="pagination pull-right">
				    <li>
				      <a href="<?php echo U('admin/borrow/borrowItemlist',array('to'=>'prev','page'=>$current));?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
			    	<?php if(is_array($nav)): foreach($nav as $k=>$page): if($k== $current): ?><li class="active"><a href="<?php echo U('admin/borrow/borrowItemlist',array('page'=>$k));?>"><?php echo ($k); ?></a></li>
						<?php else: ?>
							<li><a href="<?php echo U('admin/borrow/borrowItemlist',array('page'=>$k));?>"><?php echo ($k); ?></a></li><?php endif; endforeach; endif; ?>
				    <li>
				      <a href="<?php echo U('admin/borrow/borrowItemlist',array('to'=>'next','page'=>$current));?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
		</div>
	</div>
</body>
</html>