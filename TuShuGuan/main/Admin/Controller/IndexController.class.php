<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//  	$password=cookie('userid');
//		$username=cookie('username');
//		$key=cookie('key');
//		var_dump(md5($username.$password.C('COO_KIE')));
//		var_dump($key);
		$sta=che();
		if(!$sta){
			$this->error('请登录账户!','/TuShuGuan/test/index.php/admin/user/login',2);
		}
    	$this->display();
    }
	
	public function lv(){
		$this->display();
	}
}