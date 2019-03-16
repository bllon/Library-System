<?php
	namespace Admin\Model;
	use Think\Model;
	class UserModel extends Model{
		public $_validate=array(
			array('username','3,9','用户名字段数不对','1','length',3),
			array('phone','/^1[34578]\d{9}$/','手机格式不正确'),
			array('password','6,12','密码太短','1','length',3),
			array('repwd','password','两次密码不一致','1','confirm',3),
			array('username','','用户名已存在','1','unique',3)
		);
	}
?>