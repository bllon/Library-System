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
</head>
<body>
	<div class="app">
		<div class="container">
			<div class="row">
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
					<?php if(is_array($booklist)): foreach($booklist as $key=>$book): ?><tr>
							<td class="text-info"><?php echo ($book["book_id"]); ?></td>
							<td contenteditable="true"><?php echo ($book["book_name"]); ?></td>
							<td contenteditable="true"><?php echo ($book["book_writer"]); ?></td>
							<td contenteditable="true"><?php echo ($book["num"]); ?></td>
							<td class="text-danger" contenteditable="false"><?php echo ($book["borrow_num"]); ?></td>
							<td contenteditable="true"><?php echo ($book["addtime"]); ?></td>
							<td><a href="<?php echo U('admin/book/delBook',array('book_id'=>$book['book_id']));?>">删除</a></td>
						</tr><?php endforeach; endif; ?>
				</table>
				<nav aria-label="Page navigation">
				  <ul class="pagination pull-right">
				    <li>
				      <a href="<?php echo U('admin/book/book',array('to'=>'prev','page'=>$current));?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
			    	<?php if(is_array($nav)): foreach($nav as $k=>$page): if($k== $current): ?><li class="active"><a href="<?php echo U('admin/book/book',array('page'=>$k));?>"><?php echo ($k); ?></a></li>
						<?php else: ?>
							<li><a href="<?php echo U('admin/book/book',array('page'=>$k));?>"><?php echo ($k); ?></a></li><?php endif; endforeach; endif; ?>
				    <li>
				      <a href="<?php echo U('admin/book/book',array('to'=>'next','page'=>$current));?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
				<small class="text-danger">备注：（点击表格可进行编辑修改）</small>
			</div>
		</div>
	</div>
	
</body>
<script src="/TuShuGuan/test/Public/Admin/js/book.js"></script>
</html>