<?php
	function jm($a){
		return md5($a);
	}
	
	
	
	function che(){
		return jm(cookie('username').cookie('userid').C('COO_KIE'))===cookie('key');
	}
	
	function getPage($num,$curr,$cnt){
		/**
		*生成分页代码
		*param int num 文章总数
		*param int curr 当前显示的页码数
		*param int cnt 每页文章数
		*/
		$max=ceil($num/$cnt);
		$left=max(1,$curr-2);
		$right=min($curr+2,$max);
		$left=max(1,$right-4);
		
		$page=array();
		for($i=$left;$i<=$right;$i++){
			$_GET['page']=$i;
			$page[$i]=http_build_query($_GET);
		}
		
		return $page;
	}
?>