<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
    	if(IS_POST){	
    		$username=I('post.username');
			$password=I('post.pass');
		
			$userModel=D('user');
			$userinfo=$userModel->where(array('username'=>$username))->find();
			if(!$userinfo){
				$this->error('用户名错误','',2);
			}
			
			if($userinfo['password']!==md5($password.$userinfo['salt'])){
				$this->error('密码错误','',2);
			}else{
				cookie('userid',$userinfo['password']);
				cookie('username',$userinfo['username']);
				
				$coo_kie=jm($userinfo['username'].$userinfo['password'].C('COO_KIE'));
				cookie('key',$coo_kie);
				$this->success('登陆成功','../index/index',2);
//				echo "<script>alert('登录');location.href='../index/index';</script>";
			}
			
    	}
    	$this->display();
    }
	
	public function reg(){
		if(IS_POST){
			$userModel=D('User');
			if(!$userModel->create()){
				echo $userModel->getError();
				exit;
			}
			$s=$this->yan();
			$userModel->password=md5($userModel->password.$s);
			$userModel->salt=$s;
			$userModel->add();
			$this->success('注册成功','',2);
		}
		
		$this->display();
	}
	
	public function yan(){
		$str='asdagafkjlahl*^*&()&ldaga&(*(&(*^*(()';
		$yan=substr(str_shuffle($str),0,8);//打乱字符串，并截取
		return $yan;
	}
	
	public function yzm(){
		ob_clean();
		$Verify=new \Think\Verify();
		$Verify->imageW=150;
		$Verify->imageH=50;
		$Verify->fontSize=20;
		$Verify->length=4;
		$Verify->entry();
	}
	
	public function update(){
		if(IS_POST){
			$username=cookie('username');
			$curPassword=I('post.curPassword');
			$newPassword=I('post.newPassword');
			$phone=I('post.phone');
			$code=I('post.yzm');
			$verify = new \Think\Verify();
			if(!$verify->check($code)){
				$this->error('验证码错误','./update',2);
			}
			
			$userModel=D('user');
			$user=$userModel->where("username='".$username."'")->select();
			if($user[0]['password']!=md5($curPassword.$user[0]['salt'])){
				$this->error('密码错误','./update',2);
			}
			if($phone!=$user[0]['phone']){
				$this->error('手机号错误','./update',2);
			}
			$userModel->password=md5($newPassword.$user[0]['salt']);
			$userModel->where("username='".$username."'")->save();
			$this->success('修改成功','./update',2);
		}
		$this->display();
	}
	
	//清除退出登录
	public function logout(){
		cookie('username',null);
		cookie('userid',null);
		cookie('key',null);
		$this->success('退出成功!','./login','2');
	}
}