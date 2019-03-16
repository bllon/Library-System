<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>跳转提示</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>

<style type="text/css">

*{ padding: 0; margin: 0; }

html,body{
	width:100%;
	height:100%;
}
body{
	width:100%;
	height:100%;
	background:#fff;
	overflow:hidden;
	font-family: '微软雅黑';
	color: #CCC; 
	font-size: 16px;
}
.app{
	width:100%;
	height:100%;
}
.system-message{
	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-80%);
	padding: 24px 48px;
	margin:auto; 
	border: #CCC 3px solid; 
	width:500px; 
	border-radius:10px;

    -moz-border-radius:10px; /* Old Firefox */
}

.system-message h1{ 
	font-size: 100px;
	font-weight: normal; 
	line-height: 120px; 
	margin-bottom: 5px; 
}

.system-message .jump{ 
	padding-top: 10px; 
	color: #999;
}

.system-message .success,.system-message .error{ 
	line-height: 1.8em;  
	color: #999; 
	font-size: 36px; 
	font-family: '黑体'; 
}

.system-message .detail{ 
	font-size: 12px; 
	line-height: 20px; 
	margin-top: 12px; 
	display:none;
}

</style>

<!-- Bootstrap core CSS -->

<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<div class="app">
		<div class="system-message">
	
			<?php if(isset($message)): ?><h1 class="glyphicon glyphicon-ok-circle" style="color:#09F"></h1>
				
				<p class="success"><?php echo($message); ?></p>
				
				<?php else: ?>
				
				<h1 class="glyphicon glyphicon-exclamation-sign" style="color:#F33"></h1>
				
				<p class="error"><?php echo($error); ?></p><?php endif; ?>
			
			<p class="detail"></p>
			
			<p class="jump">
			
			页面自动 <a id="href" class="text-primary" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
			
			</p>
			
		</div>
	</div>

	
	
	

</body>
	
	<script type="text/javascript">
		(function(){
		
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		
		var interval = setInterval(function(){
		
		    var time = --wait.innerHTML;
		
		    if(time <= 0) {
		
		        location.href = href;
		
		        clearInterval(interval);
		
		    };
		
		}, 1000);
		
		})();
	
	</script>
</html>